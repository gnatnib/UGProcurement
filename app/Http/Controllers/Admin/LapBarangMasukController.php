<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangmasukModel;
use App\Models\Admin\RequestBarangModel;
use App\Models\Admin\WebModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;

class LapBarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $data["title"] = "Lap Barang Masuk";
        return view('Admin.Laporan.BarangMasuk.index', $data);
    }

    public function print(Request $request)
    {
        if ($request->tglawal) {
            $data['data'] = BarangmasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_id', '=', 'tbl_barangmasuk.barang_kode')->leftJoin('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_barangmasuk.customer_id')->whereBetween('bm_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('bm_id', 'DESC')->get();
        } else {
            $data['data'] = BarangmasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_id', '=', 'tbl_barangmasuk.barang_kode')->leftJoin('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_barangmasuk.customer_id')->orderBy('bm_id', 'DESC')->get();
        }

        $data["title"] = "Print Barang Masuk";
        $data['web'] = WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        return view('Admin.Laporan.BarangMasuk.print', $data);
    }

    public function pdf(Request $request)
{
    $data['data'] = BarangmasukModel::join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
    ->select('tbl_barangmasuk.*', 'tbl_barang.barang_nama', 'tbl_barang.barang_harga')
    ->where('request_id', $request->id)
    ->get();

    $data["title"] = "PDF Permintaan Barang";
    $data['web'] = WebModel::first();
    $data['request'] = RequestBarangModel::find($request->id);
    $pdf = PDF::loadView('Admin.Laporan.BarangMasuk.pdf', $data);
    return $pdf->download('permintaan-barang-'.$request->id.'.pdf');
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
