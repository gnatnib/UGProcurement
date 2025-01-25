<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
       $query = DB::table('tbl_barangmasuk')
           ->leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
           ->leftJoin('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_barangmasuk.customer_id')
           ->orderBy('bm_id', 'DESC');

       if ($request->tglawal) {
           $query->whereBetween('bm_tanggal', [$request->tglawal, $request->tglakhir]);
       }

       $data['data'] = $query->get();
       $data["title"] = "Print Barang Masuk";
       $data['web'] = DB::table('tbl_web')->first();
       $data['tglawal'] = $request->tglawal;
       $data['tglakhir'] = $request->tglakhir;
       
       return view('Admin.Laporan.BarangMasuk.print', $data);
   }

   public function pdf(Request $request)
   {
       $data['data'] = DB::table('tbl_barangmasuk')
           ->join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
           ->select('tbl_barangmasuk.*', 'tbl_barang.barang_nama', 'tbl_barang.barang_harga')
           ->where('request_id', $request->id)
           ->get();

       $data["title"] = "PDF Permintaan Barang";
       $data['web'] = DB::table('tbl_web')->first();
       $data['request'] = DB::table('tbl_request_barang')->find($request->id);
       
       $pdf = PDF::loadView('Admin.Laporan.BarangMasuk.pdf', $data);
       return $pdf->download('permintaan-barang-'.$request->id.'.pdf');
   }

   public function show(Request $request)
{
   if ($request->ajax()) {
       $query = DB::table('tbl_request_barang')
           ->select('tbl_request_barang.*')
           ->orderBy('request_id', 'DESC');

       if (auth()->check() && auth()->user()->role_id == 3) {
           $query->where('tbl_request_barang.user_id', auth()->user()->user_id);
       }

       if ($request->tglawal) {
           $query->whereBetween('request_tanggal', [$request->tglawal, $request->tglakhir]);
       }

       return DataTables::of($query)
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
                       <i class="fe fe-printer"></i> Print</button>
                       <button class="btn btn-danger-light btn-sm" onclick="pdf(\''.$row->request_id.'\')">
                       <i class="fa fa-file-pdf-o"></i> PDF</button>';
           })
           ->rawColumns(['status', 'action'])
           ->make(true);
   }
}
   public function csv(Request $request)
   {
       $month = Carbon::now()->format('m');
       $year = Carbon::now()->format('Y');
       
       $data = DB::table('tbl_request_barang')
           ->join('tbl_barangmasuk', 'tbl_barangmasuk.request_id', '=', 'tbl_request_barang.request_id')
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
           fputcsv($handle, []);
       }

       fclose($handle);

       return response()->download($filename)->deleteFileAfterSend(true);
   }
}