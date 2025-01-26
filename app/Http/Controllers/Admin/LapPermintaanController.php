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

class LapPermintaanController extends Controller
{
    public function index(Request $request)
    {
        $data["title"] = "Lap Barang Masuk";
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
            'tbl_barangmasuk.harga as barang_harga', // Menggunakan harga dari tbl_barangmasuk
            'tbl_barang.barang_nama',
            'tbl_request_barang.keterangan',
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
        return $pdf->download('permintaan-'.$request->id.'.pdf');
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
        if ($request->tglawal == '') {
            $data = RequestBarangModel::orderBy('request_id', 'DESC')->get();
        } else {
            $data = RequestBarangModel::whereBetween('request_tanggal', [$request->tglawal, $request->tglakhir])
                    ->orderBy('request_id', 'DESC')
                    ->get();
        }
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl', function ($row) {
                return Carbon::parse($row->request_tanggal)->translatedFormat('d F Y');
            })
            ->addColumn('status', function ($row) {
                if($row->status == 'Pending') {
                    return '<span class="badge bg-warning">Pending</span>';
                } else if($row->status == 'Diterima') {
                    return '<span class="badge bg-success">Diterima</span>';
                } else {
                    return '<span class="badge bg-danger">Ditolak</span>';
                }
            })
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-primary-light btn-sm" onclick="print(\''.$row->request_id.'\')">
                            <i class="fe fe-printer"></i> Print
                        </button>
                        <button class="btn btn-danger-light btn-sm" onclick="pdf(\''.$row->request_id.'\')">
                            <i class="fa fa-file-pdf-o"></i> PDF
                        </button>';
            })
            ->rawColumns(['tgl', 'status', 'action'])
            ->make(true);
    }
}

}
