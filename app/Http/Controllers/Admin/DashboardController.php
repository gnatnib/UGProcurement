<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangkeluarModel;
use App\Models\Admin\BarangmasukModel;
use App\Models\Admin\BarangModel;
use App\Models\Admin\CustomerModel;
use App\Models\Admin\JenisBarangModel;
use App\Models\Admin\MerkModel;
use App\Models\Admin\RoleModel;
use App\Models\Admin\SatuanModel;
use App\Models\Admin\UserModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
       $user = Session::get('user');
       $data = [
           "title" => "Dashboard",
           "jenis" => JenisBarangModel::orderBy('jenisbarang_id', 'DESC')->count(),
           "satuan" => SatuanModel::orderBy('satuan_id', 'DESC')->count(),
           "merk" => MerkModel::orderBy('merk_id', 'DESC')->count(),
           "barang" => BarangModel::leftJoin('tbl_jenisbarang', 'tbl_jenisbarang.jenisbarang_id', '=', 'tbl_barang.jenisbarang_id')
               ->leftJoin('tbl_satuan', 'tbl_satuan.satuan_id', '=', 'tbl_barang.satuan_id')
               ->leftJoin('tbl_merk', 'tbl_merk.merk_id', '=', 'tbl_barang.merk_id')
               ->orderBy('barang_id', 'DESC')
               ->count(),
           "bm" => BarangmasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
               ->leftJoin('tbl_user', 'tbl_user.user_id', '=', 'tbl_barangmasuk.user_id')
               ->orderBy('bm_id', 'DESC')
               ->count(),
           "bk" => BarangkeluarModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangkeluar.barang_kode')
               ->orderBy('bk_id', 'DESC')
               ->count(),
           "user" => UserModel::leftJoin('tbl_role', 'tbl_role.role_id', '=', 'tbl_user.role_id')
               ->orderBy('user_id', 'DESC')
               ->count(),
           "active_requests" => DB::table('tbl_request_barang')
               ->whereIn('status', ['draft', 'pending'])
               ->count(),
           "user_role" => $user->role_id
       ];
    
       return view('Admin.Dashboard.index', $data);
    }
    
    public function getDivisionBookings()
    {
        $bookings = DB::table('tbl_request_barang')
            ->select('divisi', DB::raw('COUNT(*) as total'))
            ->whereNotIn('status', ['rejected'])
            ->groupBy('divisi')
            ->get();
            
        return response()->json([
            'success' => true,
            'data' => $bookings
        ]);
    }
}
