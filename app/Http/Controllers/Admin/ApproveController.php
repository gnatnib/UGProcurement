<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangmasukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ApproveController extends Controller
{
    public function index()
    {
        if(Session::get('user')->role_id != 4) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $data["title"] = "Approval";
        return view('Admin.Approval.approval', $data);
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $user = Session::get('user');
            
            // Query untuk mendapatkan request yang perlu diapprove
            $data = DB::table('tbl_barangmasuk as bm')
                ->join('tbl_user as creator', 'creator.user_id', '=', 'bm.user_id')
                ->join('tbl_request_barang as r', 'r.request_id', '=', 'bm.request_id')
                ->select(
                    'r.request_id',
                    'r.request_tanggal',
                    'r.request_kode',
                    'creator.divisi',
                    'creator.departemen',
                    'r.status'
                )
                ->where([
                    ['creator.divisi', 'LIKE', trim($user->divisi)],
                    ['creator.departemen', '=', $user->departemen]
                ])
                ->groupBy('r.request_id', 'r.request_tanggal', 'r.request_kode', 'creator.divisi', 'creator.departemen', 'r.status')
                ->orderBy('r.request_tanggal', 'DESC')
                ->get();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal_format', function($row) {
                    return Carbon::parse($row->request_tanggal)->format('d/m/Y');
                })
                ->addColumn('status_badge', function($row) {
                    switch($row->status) {
                        case 'approved':
                            return '<span class="badge bg-success">Disetujui</span>';
                        case 'pending':
                        case null:
                            return '<span class="badge bg-warning">Pending</span>';
                        case 'rejected':
                            return '<span class="badge bg-danger">Ditolak</span>';
                        default:
                            return '<span class="badge bg-secondary">-</span>';
                    }
                })
                ->addColumn('action', function($row) {
                    // Untuk requests yang belum disetujui/ditolak
                    if($row->status != 'approved' && $row->status != 'rejected') {
                        return '<button class="btn btn-success btn-sm" onclick="showDetail(\''.$row->request_id.'\')">
                                <i class="fe fe-eye"></i> Detail
                               </button>';
                    }
                    // Untuk requests yang sudah disetujui/ditolak
                    return '<button class="btn btn-info btn-sm" onclick="showDetail(\''.$row->request_id.'\')">
                            <i class="fe fe-eye"></i> Detail
                           </button>';
                })
                ->rawColumns(['action', 'status_badge'])
                ->make(true);
        }
    }
    public function getDetail($request_id)
    {
        $detail = DB::table('tbl_barangmasuk as bm')
            ->join('tbl_barang as b', 'b.barang_kode', '=', 'bm.barang_kode')
            ->select('bm.*', 'b.barang_nama')
            ->where('bm.request_id', $request_id)
            ->get();

        return response()->json($detail);
    }

    public function approve($id)
    {
        try {
            $user = Session::get('user');
            $barangMasuk = BarangmasukModel::with(['user'])->find($id);
            
            // Cek divisi dan departemen dari user pembuat request
            if ($barangMasuk->user->divisi != $user->divisi || 
                $barangMasuk->user->departemen != $user->departemen) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Unauthorized access'
                ], 403);
            }
    
            $barangMasuk->approval = 'Approve';
            $barangMasuk->save();
    
            return response()->json([
                'success' => true, 
                'message' => 'Successfully approved'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function reject($id)
    {
        try {
            $user = Session::get('user');
            $barangMasuk = BarangmasukModel::with(['user'])->find($id);
            
            // Cek divisi dan departemen dari user pembuat request
            if ($barangMasuk->user->divisi != $user->divisi || 
                $barangMasuk->user->departemen != $user->departemen) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Unauthorized access'
                ], 403);
            }
    
            $barangMasuk->approval = 'Reject';
            $barangMasuk->save();
    
            return response()->json([
                'success' => true, 
                'message' => 'Successfully rejected'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function bulkUpdate(Request $request)
    {
        try {
            // Debug log
            Log::info('Received approval data:', [
                'request_id' => $request->request_id,
                'approvals' => $request->approvals
            ]);
    
            DB::beginTransaction();
            
            // Validasi data
            if (empty($request->request_id) || empty($request->approvals)) {
                throw new \Exception('Data tidak lengkap');
            }
    
            foreach ($request->approvals as $bm_id => $status) {
                Log::info('Updating barang masuk:', [
                    'bm_id' => $bm_id,
                    'status' => $status
                ]);
    
                $updated = DB::table('tbl_barangmasuk')
                    ->where('bm_id', $bm_id)
                    ->update([
                        'approval' => $status,
                        'updated_at' => now()
                    ]);
    
                Log::info('Update result:', ['updated' => $updated]);
            }
    
            // Update status request menjadi Approve
            $updated = DB::table('tbl_request_barang')
                ->where('request_id', $request->request_id)
                ->update([
                    'status' => 'approved',
                    'updated_at' => now()
                ]);
    
            Log::info('Request update result:', ['updated' => $updated]);
    
            DB::commit();
            
            return response()->json([
                'success' => true,
                'message' => 'Status approval berhasil diupdate'
            ]);
    
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in bulkUpdate:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

}