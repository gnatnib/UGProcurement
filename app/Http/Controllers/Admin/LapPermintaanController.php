<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\RequestBarangModel;
use App\Models\Admin\WebModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class LapPermintaanController extends Controller
{
    public function index(Request $request)
    {
        $data["title"] = "Lap Permintaan";
        return view('Admin.Laporan.Permintaan.index', $data);
    }

    public function print(Request $request)
    {
        if ($request->tglawal) {
            $data['data'] = RequestBarangModel::whereBetween('request_tanggal', [$request->tglawal, $request->tglakhir])
                ->orderBy('request_id', 'DESC')->get();
        } else {
            $data['data'] = RequestBarangModel::orderBy('request_id', 'DESC')->get();
        }

        $data["title"] = "Print Permintaan";
        $data['web'] = WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        return view('Admin.Laporan.Permintaan.print', $data);
    }

    public function pdf(Request $request)
    {
        $data['data'] = RequestBarangModel::select(
            'tbl_request_barang.*',
            'tbl_barang.barang_nama',
            'tbl_barang.barang_harga'
        )
        ->join('tbl_barangmasuk', 'tbl_barangmasuk.request_id', '=', 'tbl_request_barang.request_id')
        ->join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
        ->where('tbl_request_barang.request_id', $request->id)
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

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->tglawal ? 
                RequestBarangModel::whereBetween('request_tanggal', [$request->tglawal, $request->tglakhir])->orderBy('request_id', 'DESC')->get() :
                RequestBarangModel::orderBy('request_id', 'DESC')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    return Carbon::parse($row->request_tanggal)->translatedFormat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-primary-light btn-sm" onclick="print(\''.$row->request_id.'\')">
                                <i class="fe fe-printer"></i> Print
                            </button>
                            <button class="btn btn-danger-light btn-sm" onclick="pdf(\''.$row->request_id.'\')">
                                <i class="fa fa-file-pdf-o"></i> PDF
                            </button>';
                })
                ->rawColumns(['tgl', 'action'])
                ->make(true);
        }
    }

    public function csv()
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

        $filename = 'laporan-permintaan-' . $month . '-' . $year . '.csv';
        $handle = fopen($filename, 'w+');
        
        fputcsv($handle, ['Departemen', 'Barang', 'Jumlah', 'Harga Satuan', 'Total']);

        foreach($data as $dept => $items) {
            $deptTotal = 0;
            foreach($items as $item) {
                $total = $item->jumlah * $item->barang_harga;
                fputcsv($handle, [$dept, $item->barang_nama, $item->jumlah, $item->barang_harga, $total]);
                $deptTotal += $total;
            }
            fputcsv($handle, ['Total ' . $dept, '', '', '', $deptTotal]);
            fputcsv($handle, []);
        }

        fclose($handle);
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
