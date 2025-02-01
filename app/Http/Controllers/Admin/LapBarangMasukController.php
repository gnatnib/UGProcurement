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
use PDF;

use Illuminate\Support\Facades\Log;


class LapBarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $data["title"] = "Lap Barang Masuk";
        return view('Admin.Laporan.BarangMasuk.index', $data);
    }

   

    public function pdf(Request $request)
{
    $data['data'] = BarangmasukModel::join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
        ->select('tbl_barangmasuk.*', 'tbl_barang.barang_nama', 'tbl_barang.barang_harga')
        ->where('request_id', $request->id)
        ->get()
        ->map(function($item) {
            // Capitalize first letter of status
            $item->tracking_status = ucfirst(strtolower($item->tracking_status));
            return $item;
        });

    $data["title"] = "PDF Permintaan Barang";
    $data['web'] = WebModel::first();
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
    
    // Ambil data tanda tangan
    $signatures = DB::table('tbl_signatures')
        ->join('tbl_user', 'tbl_signatures.user_id', '=', 'tbl_user.user_id')
        ->where('request_id', $request->id)
        ->select('tbl_signatures.*', 'tbl_user.user_nmlengkap', 'tbl_user.role_id')
        ->get();

    // Proses setiap tanda tangan
    $processedSignatures = $signatures->map(function($sig) {
        try {
            // Cast $sig ke object jika belum berbentuk object
            $signature = (object) $sig;
            
            // Hilangkan prefix data:image/png;base64, jika ada
            $signatureData = $signature->signature;
            if (strpos($signatureData, 'data:image/png;base64,') !== false) {
                $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
            }
            
            // Decode base64 ke image
            $imageData = base64_decode($signatureData);
            
            if ($imageData) {
                // Convert kembali ke base64 untuk PDF
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
    
    $pdf = app('dompdf.wrapper');
    $pdf->loadView('Admin.Laporan.BarangMasuk.pdf', $data);
    
    return $pdf->download('permintaan-barang-'.$request->id.'.pdf');
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
        $user = Session::get('user');  // Ambil user dari session

        // Cek role_id, jika 4 atau 5 hanya lihat departemen sendiri, jika 1,2,3 lihat semua
        if (in_array($user->role_id, [4, 5])) {
            $query = RequestBarangModel::where('status', 'Diterima')
                ->where('departemen', $user->departemen);  // Filter berdasarkan departemen user
        } else {
            $query = RequestBarangModel::where('status', 'Diterima');
        }

        if ($request->tglawal == '') {
            $data = $query->orderBy('request_id', 'DESC')->get();
        } else {
            $data = $query->whereBetween('request_tanggal', [$request->tglawal, $request->tglakhir])
                ->orderBy('request_id', 'DESC')
                ->get();
        }

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
    $month = Carbon::now()->format('m');
    $year = Carbon::now()->format('Y');
    
    $data = RequestBarangModel::join('tbl_barangmasuk', 'tbl_barangmasuk.request_id', '=', 'tbl_request_barang.request_id')
        ->join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
        ->whereMonth('request_tanggal', $month)
        ->whereYear('request_tanggal', $year)
        ->select('departemen', 'barang_nama', 'bm_jumlah as jumlah', 'barang_harga')
        ->get()
        ->groupBy('departemen');

    $filename = 'laporan-barang-' . $month . '-' . $year . '.csv';
    $handle = fopen($filename, 'w+');
    
    fputcsv($handle, ['Departemen', 'Barang', 'Jumlah', 'Harga Satuan', 'Total']);

    foreach($data as $dept => $items) {
        $deptTotal = 0;
        
        foreach($items as $item) {
            $total = $item->jumlah * $item->barang_harga;
            fputcsv($handle, [
                $dept,
                $item->barang_nama,
                $item->jumlah,
                $item->barang_harga,
                $total
            ]);
            $deptTotal += $total;
        }
        
        fputcsv($handle, ['Total ' . $dept, '', '', '', $deptTotal]);
        fputcsv($handle, []); // Empty line between departments
    }

    fclose($handle);

    return response()->download($filename)->deleteFileAfterSend(true);
}
}