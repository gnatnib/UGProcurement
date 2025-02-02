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
        
        // Query dasar untuk barang masuk
        $barangMasukQuery = BarangmasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
            ->leftJoin('tbl_user', 'tbl_user.user_id', '=', 'tbl_barangmasuk.user_id');
        
        // Query dasar untuk request selesai
        $completedRequestQuery = DB::table('tbl_request_barang')
            ->where('status', 'Diterima');
        
        // Query dasar untuk active request
        $activeRequestQuery = DB::table('tbl_request_barang')
            ->whereIn('status', ['draft', 'pending']);
    
        // Menerapkan filter berdasarkan role
        if ($user->role_id == 5) {
            // User biasa: hanya melihat datanya sendiri
            $barangMasukQuery->where('tbl_barangmasuk.user_id', $user->user_id);
            $completedRequestQuery->where('user_id', $user->user_id);
            $activeRequestQuery->where('user_id', $user->user_id);
        } 
        elseif ($user->role_id == 4) {
            // Kepala Divisi: melihat data diri sendiri dan divisinya
            $barangMasukQuery->where('tbl_barangmasuk.divisi', $user->divisi);
            $completedRequestQuery->where('departemen', $user->departemen);
            $activeRequestQuery->where('departemen', $user->departemen);
        }
        // Role 1,2,3 bisa melihat semua data (tidak perlu filter tambahan)
        
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
            "bm" => $barangMasukQuery->count(),
            "completed_requests" => $completedRequestQuery->count(),
            "user" => UserModel::leftJoin('tbl_role', 'tbl_role.role_id', '=', 'tbl_user.role_id')
                ->orderBy('user_id', 'DESC')
                ->count(),
            "active_requests" => $activeRequestQuery->count(),
            "user_role" => $user->role_id
        ];
    
        return view('Admin.Dashboard.index', $data);
    }
    
    public function getDivisionBookings()
    {
        $bookings = DB::table('tbl_request_barang')
            ->select('divisi', DB::raw('COUNT(*) as total'))
            ->whereNotIn('status', ['draft', 'pending', 'approved', 'rejected', 'Diproses', 'Dikirim','Ditolak'])
            ->whereMonth('created_at', date('m'))  // Tambahan: filter bulan saat ini
            ->whereYear('created_at', date('Y'))   // Tambahan: filter tahun saat ini
            ->groupBy('divisi')
            ->get();
            
        return response()->json([
            'success' => true,
            'message' => 'Data untuk ' . date('F Y'), // Tambahan: info bulan-tahun
            'data' => $bookings
        ]);
    }
    public function getTopFiveBarang()
    {
        // Ambil data barang masuk yang dikelompokkan berdasarkan barang
        $topBarang = DB::table('tbl_barangmasuk')
            ->select(
                'tbl_barang.barang_nama',
                'tbl_barangmasuk.barang_kode',
                DB::raw('COUNT(DISTINCT tbl_barangmasuk.bm_kode) as total_request'), // Hitung berapa kali direquest
                DB::raw('SUM(tbl_barangmasuk.bm_jumlah) as total_jumlah'), // Total jumlah item
                DB::raw('SUM(tbl_barangmasuk.harga * tbl_barangmasuk.bm_jumlah) as total_harga') // Total harga
            )
            ->join('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
            ->join('tbl_request_barang', 'tbl_request_barang.request_id', '=', 'tbl_barangmasuk.request_id')
            ->where('tbl_request_barang.status', '=', 'Diterima') // Filter hanya yang statusnya Diterima
            ->whereMonth('tbl_barangmasuk.created_at', date('m'))
            ->whereYear('tbl_barangmasuk.created_at', date('Y'))
            ->groupBy('tbl_barangmasuk.barang_kode', 'tbl_barang.barang_nama')
            ->orderBy('total_request', 'DESC') // Urutkan berdasarkan jumlah request
            ->limit(5)
            ->get();
    
        return response()->json([
            'success' => true,
            'data' => $topBarang
        ]);
    }

}
