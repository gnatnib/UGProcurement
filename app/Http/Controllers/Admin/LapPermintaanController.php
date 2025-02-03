<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangmasukModel;
use App\Models\Admin\RequestBarangModel;
use App\Models\Admin\WebModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;
use Illuminate\Support\Facades\Session;

class LapPermintaanController extends Controller
{
    public function index(Request $request)
    {
        $data["title"] = "Lap Permintaan";
        // Get unique divisions from users table
        $data['divisions'] = DB::table('tbl_user')->select('divisi')->distinct()->pluck('divisi');
        return view('Admin.Laporan.Permintaan.index', $data);
    }

    public function print(Request $request)
    {
        if ($request->tglawal) {
            $data['data'] = BarangmasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->leftJoin('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_barangmasuk.customer_id')->whereBetween('bm_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bm_id', 'DESC')->get();
        } else {
            $data['data'] = BarangmasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')->leftJoin('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_barangmasuk.customer_id')->orderBy('bm_id', 'DESC')->get();
        }

        $data["title"] = "Print Barang Masuk";
        $data['web'] = WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        return view('Admin.Laporan.Permintaan.print', $data);
    }

    public function pdf(Request $request)
    {
        $data['data'] = BarangmasukModel::select(
            'tbl_barangmasuk.barang_kode',
            'tbl_barangmasuk.bm_jumlah',
            'tbl_barangmasuk.harga as barang_harga',
            'tbl_barangmasuk.keterangan', // Mengambil keterangan dari tbl_barangmasuk
            'tbl_barang.barang_nama',
            'tbl_request_barang.request_tanggal',
            'tbl_request_barang.departemen'
        )
            ->join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
            ->join('tbl_request_barang', 'tbl_request_barang.request_id', '=', 'tbl_barangmasuk.request_id')
            ->where('tbl_barangmasuk.request_id', $request->id)
            ->get();
    
        $data["title"] = "PDF Permintaan";
        $data['web'] = WebModel::first();
        $data['request'] = RequestBarangModel::find($request->id);
        $data['signatures'] = DB::table('tbl_signatures')
            ->where('request_id', $request->id)
            ->get()
            ->keyBy('signer_type');
    
        $pdf = PDF::loadView('Admin.Laporan.Permintaan.pdf', $data);
        return $pdf->download('permintaan-' . $request->id . '.pdf');
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
            $query = RequestBarangModel::query();
    
            // Apply date filter if provided
            if ($request->tglawal && $request->tglakhir) {
                $query->whereBetween('request_tanggal', [$request->tglawal, $request->tglakhir]);
            }
    
            // Apply role-based filters
            if ($user->role_id == '5') {
                $query->where('user_id', $user->user_id);
            } elseif ($user->role_id == '4') {
                $query->where(function($q) use ($user) {
                    $q->where('departemen', $user->departemen)
                      ->orWhere('user_id', $user->user_id);
                });
            } elseif (in_array($user->role_id, ['2', '3'])) {
                if ($request->divisi) {
                    $query->where('divisi', $request->divisi);
                }
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
    $requestQuery = RequestBarangModel::query();

    if ($request->tglawal && $request->tglakhir) {
        $requestQuery->whereDate('request_tanggal', '>=', $request->tglawal)
                    ->whereDate('request_tanggal', '<=', $request->tglakhir);
    }

    // Role-based filtering
    if ($user->role_id == '5') {
        $requestQuery->where('user_id', $user->user_id);
    } 
    else if ($user->role_id == '4') {
        $requestQuery->where(function($query) use ($user) {
            $query->where('user_id', $user->user_id)
                  ->orWhere('departemen', $user->departemen);
        });
    }
    else if (in_array($user->role_id, ['2', '3']) && $request->divisi) {
        $requestQuery->where('divisi', $request->divisi);
    }

    $requests = $requestQuery->get();

    if ($requests->isEmpty()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Tidak ada data pada periode yang dipilih'
        ]);
    }

    $handle = fopen('php://temp', 'r+');

    // Write report header with complete info
    fputs($handle, "LAPORAN PERMINTAAN BARANG\n\n");
    fputs($handle, "INFORMASI LAPORAN:\n");
    fputs($handle, "Periode: " . Carbon::parse($request->tglawal)->format('d/m/Y') . " - " . Carbon::parse($request->tglakhir)->format('d/m/Y') . "\n");
    
    // For roles 2 & 3, show requesting divisions instead of user's division
    if (in_array($user->role_id, ['2', '3'])) {
        if ($request->divisi) {
            fputs($handle, "Filter Divisi: " . $request->divisi . "\n");
        } else {
            $divisions = $requests->pluck('divisi')->unique()->implode(', ');
            fputs($handle, "Divisi: " . $divisions . "\n");
        }
    } else {
        fputs($handle, "Departemen: " . $user->departemen . "\n");
        fputs($handle, "Divisi: " . $user->divisi . "\n");
    }
    fputs($handle, "\n");

    // Rest of the code remains the same...
    fputs($handle, '"Request ID","Tanggal Request","Departemen","Divisi","Kode Barang","Nama Barang","Jumlah","Harga Satuan","Total Harga"' . "\n");

    $grandTotal = 0;
    $totalItems = 0;

    foreach ($requests as $request) {
        $items = BarangmasukModel::select(
            'tbl_barangmasuk.barang_kode',
            'tbl_barangmasuk.bm_jumlah', 
            'tbl_barangmasuk.harga',
            'tbl_barang.barang_nama'
        )
        ->join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
        ->where('request_id', $request->request_id)
        ->get();

        foreach ($items as $item) {
            $totalHarga = $item->bm_jumlah * $item->harga;
            $grandTotal += $totalHarga;
            $totalItems++;

            $row = [
                $request->request_id,
                Carbon::parse($request->request_tanggal)->format('d/m/Y'),
                $request->departemen,
                $request->divisi,
                $item->barang_kode,
                $item->barang_nama,
                $item->bm_jumlah,
                number_format($item->harga, 2, ',', '.'),
                number_format($totalHarga, 2, ',', '.')
            ];
            
            fputcsv($handle, $row);
        }
    }

    fputs($handle, "\nRINGKASAN LAPORAN:\n");
    fputs($handle, "Total Request: " . $requests->count() . "\n");
    fputs($handle, "Total Item: " . $totalItems . "\n");
    fputs($handle, "Total Nilai: Rp " . number_format($grandTotal, 2, ',', '.') . "\n");

    rewind($handle);
    $content = stream_get_contents($handle);
    fclose($handle);

    return response($content)
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', 'attachment; filename="laporan_permintaan_' . date('Y-m-d_His') . '.csv"');
}

}
