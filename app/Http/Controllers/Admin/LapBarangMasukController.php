<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangmasukModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\RequestBarangModel;
use App\Models\Admin\WebModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Log;


class LapBarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $data["title"] = "Lap Barang Masuk";
        $data['divisions'] = DB::table('tbl_user')
            ->select('divisi')
            ->whereNotNull('divisi')
            ->where('divisi', '!=', '')
            ->distinct()
            ->pluck('divisi');
        return view('Admin.Laporan.BarangMasuk.index', $data);
    }



    public function pdf(Request $request)
    {
        $data['data'] = BarangmasukModel::join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
            ->join('tbl_merk', 'tbl_merk.merk_id', '=', 'tbl_barang.merk_id')
            ->join('tbl_jenisbarang', 'tbl_jenisbarang.jenisbarang_id', '=', 'tbl_barang.jenisbarang_id')
            ->select(
                'tbl_barangmasuk.*',
                'tbl_barang.barang_nama',
                'tbl_barang.barang_harga',
                'tbl_merk.merk_nama',
                'tbl_jenisbarang.jenisbarang_nama',
                'tbl_barangmasuk.satuan'
            )
            ->where('request_id', $request->id)
            ->get()
            ->map(function ($item) {
                $item->tracking_status = ucfirst(strtolower($item->tracking_status));
                $item->jumlah_satuan = $item->bm_jumlah . ' ' . $item->satuan;
                return $item;
            });

        $data["title"] = "PDF Permintaan Barang";
        $data['web'] = WebModel::first();

        // Get request details
        $request_data = RequestBarangModel::join('tbl_user', 'tbl_request_barang.user_id', '=', 'tbl_user.user_id')
            ->where('request_id', $request->id)
            ->select(
                'tbl_request_barang.request_id',
                'tbl_request_barang.request_tanggal',
                'tbl_request_barang.status',
                'tbl_user.departemen',
                'tbl_user.divisi'
            )
            ->first();

        $request_data->request_id = str_replace('-', '/', $request_data->request_id);
        $data['request'] = $request_data;

        // Process signatures
        $signatures = DB::table('tbl_signatures')
            ->join('tbl_user', 'tbl_signatures.user_id', '=', 'tbl_user.user_id')
            ->where('request_id', $request->id)
            ->select('tbl_signatures.*', 'tbl_user.user_nmlengkap', 'tbl_user.role_id')
            ->get();

        $processedSignatures = $signatures->map(function ($sig) {
            try {
                $signature = (object) $sig;
                $signatureData = $signature->signature;
                if (strpos($signatureData, 'data:image/png;base64,') !== false) {
                    $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
                }
                $imageData = base64_decode($signatureData);
                if ($imageData) {
                    $signature->signature_base64 = 'data:image/png;base64,' . base64_encode($imageData);
                }
                return $signature;
            } catch (\Exception $e) {
                Log::error('Error processing signature: ' . $e->getMessage());
                return (object) [
                    'signature_base64' => null,
                    'signer_type' => $sig->signer_type ?? null,
                    'user_nmlengkap' => $sig->user_nmlengkap ?? null,
                ];
            }
        })->keyBy('signer_type');

        $userSignature = $signatures->where('action', 'Complete')->first();
        if ($userSignature) {
            $processedSignatures['User'] = $userSignature;
        }
        $data['signatures'] = $processedSignatures;


        $pdf = Pdf::setOptions([
            'isRemoteEnabled' => true,
            'chroot' => public_path()
        ])->setPaper('A4', 'landscape')->loadView('Admin.Laporan.BarangMasuk.pdf', $data);

        return $pdf->download('permintaan-barang-' . $request->id . '.pdf');
    }

    public function storeSignature(Request $request)
    {
        $imageData = $request->input('signature'); // Assume base64 input
        $imageName = uniqid() . '.png'; // Generate unique file name
        $imagePath = storage_path('app/public/signatures/' . $imageName);

        // Convert base64 to image and save
        $image = base64_decode($imageData);
        file_put_contents($imagePath, $image);

        // Save file path to database
        DB::table('tbl_signatures')->insert([
            'request_id' => $request->request_id,
            'user_id' => auth()->user()->user_id,
            'role_id' => auth()->user()->role_id,
            'signature' => $imageName, // Save image name
            'action' => 'Signed',
            'signer_type' => $request->signer_type,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $user = Session::get('user');
            $query = RequestBarangModel::where('status', 'Diterima');

            // Apply date filter if provided
            if ($request->tglawal && $request->tglakhir) {
                $query->whereBetween('request_tanggal', [$request->tglawal, $request->tglakhir]);
            }

            // Apply division filter if provided
            if ($request->divisi) {
                $query->where('divisi', $request->divisi);
            }

            // Apply role-based filters
            if ($user->role_id == '5') {
                $query->where('user_id', $user->user_id);
            } elseif ($user->role_id == '4') {
                $query->where(function ($q) use ($user) {
                    $q->where('departemen', $user->departemen)
                        ->orWhere('user_id', $user->user_id);
                });
            }

            $data = $query->orderBy('request_id', 'DESC')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    return Carbon::parse($row->request_tanggal)->translatedFormat('d F Y');
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'Pending') {
                        return '<span class="badge bg-warning">Pending</span>';
                    } else if ($row->status == 'Diterima') {
                        return '<span class="badge bg-success">Diterima</span>';
                    } else {
                        return '<span class="badge bg-danger">Ditolak</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                        <button class="btn btn-danger-light btn-sm" onclick="pdf(\'' . $row->request_id . '\')">
                            <i class="fa fa-file-pdf-o"></i> PDF
                        </button>';
                })
                ->rawColumns(['tgl', 'status', 'action'])
                ->make(true);
        }
    }
    public function csv(Request $request)
    {
        $user = Session::get('user');

        $requestQuery = RequestBarangModel::select(
            'request_id',
            'request_tanggal',
            'departemen',
            'divisi'
        );

        if ($request->has('tglawal') && $request->has('tglakhir')) {
            $requestQuery->whereBetween('request_tanggal', [$request->tglawal, $request->tglakhir]);
        }

        if ($user->role_id == '5') {
            $requestQuery->where('user_id', $user->user_id);
        } elseif ($user->role_id == '4') {
            $requestQuery->where(function ($q) use ($user) {
                $q->where('departemen', $user->departemen)
                    ->orWhere('user_id', $user->user_id);
            });
        }

        $requests = $requestQuery->get();

        if ($requests->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data pada periode yang dipilih'
            ]);
        }

        $requestDetails = BarangmasukModel::select(
            'tbl_barangmasuk.request_id',
            'tbl_barangmasuk.barang_kode',
            'tbl_barang.barang_nama',
            'tbl_barangmasuk.bm_jumlah',
            'tbl_barangmasuk.satuan',
            'tbl_barangmasuk.harga',
            'tbl_barangmasuk.divisi',
            'tbl_barangmasuk.tracking_status'
        )
            ->join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
            ->whereIn('tbl_barangmasuk.request_id', $requests->pluck('request_id'))
            ->where('tbl_barangmasuk.tracking_status', 'Diterima')
            ->get()
            ->groupBy('request_id');

        $divisiSummary = $requestDetails->flatten()->groupBy('divisi')->map(function ($group) {
            return [
                'total_barang' => $group->sum('bm_jumlah'),
                'total_harga' => $group->sum(fn($item) => $item->bm_jumlah * $item->harga)
            ];
        });

        $filename = 'laporan_permintaan_' . date('Y-m-d_His') . '.csv';

        $handle = fopen('php://temp', 'r+');

        fputcsv($handle, ['Periode Laporan']);
        fputcsv($handle, ['Tanggal Awal:', $request->tglawal ?? 'Semua Tanggal']);
        fputcsv($handle, ['Tanggal Akhir:', $request->tglakhir ?? 'Semua Tanggal']);
        fputcsv($handle, []);

        fputcsv($handle, ['Ringkasan Total per Divisi (Barang Diterima)']);
        fputcsv($handle, ['Divisi', 'Total Barang', 'Total Harga']);
        foreach ($divisiSummary as $divisi => $summary) {
            fputcsv($handle, [$divisi, $summary['total_barang'], number_format($summary['total_harga'], 2, ',', '.')]);
        }
        fputcsv($handle, []);

        fputcsv($handle, [
            'Request ID',
            'Tanggal Request',
            'Departemen',
            'Divisi',
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Satuan',
            'Harga Satuan',
            'Total Harga'
        ]);

        $grandTotal = 0;

        foreach ($requests as $request) {
            $barangDetails = $requestDetails[$request->request_id] ?? collect();
            $totalHargaRequest = 0;

            if ($barangDetails->isEmpty()) {
                fputcsv($handle, [
                    $request->request_id,
                    Carbon::parse($request->request_tanggal)->format('d/m/Y'),
                    $request->departemen,
                    $request->divisi,
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ]);
            } else {
                foreach ($barangDetails as $barang) {
                    $totalHarga = $barang->bm_jumlah * $barang->harga;
                    $totalHargaRequest += $totalHarga;

                    fputcsv($handle, [
                        $request->request_id,
                        Carbon::parse($request->request_tanggal)->format('d/m/Y'),
                        $request->departemen,
                        $request->divisi,
                        $barang->barang_kode,
                        $barang->barang_nama,
                        $barang->bm_jumlah,
                        $barang->satuan ?? '-',
                        number_format($barang->harga, 2, ',', '.'),
                        number_format($totalHarga, 2, ',', '.')
                    ]);
                }
            }

            if ($totalHargaRequest > 0) {
                fputcsv($handle, ['Total Request:', '', '', '', '', '', '', '', '', number_format($totalHargaRequest, 2, ',', '.')]);
                fputcsv($handle, []);
            }

            $grandTotal += $totalHargaRequest;
        }

        fputcsv($handle, ['Grand Total (Barang Diterima)', '', '', '', '', '', '', '', '', number_format($grandTotal, 2, ',', '.')]);

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        return response($content)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
