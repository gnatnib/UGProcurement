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

class TrackingStatusController extends Controller
{
    public function index()
    {
        if (Session::get('user')->role_id != 1) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $data["title"] = "Tracking Status";
        return view('Admin.TrackingStatus.trackingstatus', $data);
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $user = Session::get('user');

            try {
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
                    ->whereIn('r.status', ['Diproses', 'Dikirim', 'Diterima']) // Ubah ini untuk menampilkan semua status
                    ->groupBy('r.request_id', 'r.request_tanggal', 'r.request_kode', 'creator.divisi', 'creator.departemen', 'r.status')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('tanggal_format', function ($row) {
                        return date('d/m/Y', strtotime($row->request_tanggal));
                    })
                    ->addColumn('status_badge', function ($row) {
                        switch ($row->status) {
                            case 'Diproses':
                                return '<span class="badge bg-warning">Sedang Diproses</span>';
                            case 'Dikirim':
                                return '<span class="badge bg-info">Sedang Dikirim</span>';
                            case 'Diterima':
                                return '<span class="badge bg-success">Selesai</span>';
                            default:
                                return '<span class="badge bg-secondary">Menunggu Proses</span>';
                        }
                    })
                    ->addColumn('action', function ($row) {
                        return '<button class="btn btn-primary btn-sm" onclick="showDetail(\'' . $row->request_id . '\')">
                                <i class="fe fe-eye"></i> Detail
                               </button>';
                    })
                    ->rawColumns(['status_badge', 'action'])
                    ->make(true);
            } catch (\Exception $e) {
                Log::error('Error in tracking show:', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessage()
                ], 500);
            }
        }

        return abort(404);
    }

    public function getDetail($request_id)
    {
        $detail = DB::table('tbl_barangmasuk as bm')
            ->join('tbl_barang as b', 'b.barang_kode', '=', 'bm.barang_kode')
            ->join('tbl_request_barang as r', 'r.request_id', '=', 'bm.request_id')
            ->select(
                'bm.bm_id',
                'bm.barang_kode',
                'b.barang_nama',
                'bm.bm_jumlah',
                'bm.divisi',
                'bm.keterangan',
                'bm.tracking_status',
                'bm.approval',
                'r.status as request_status'
            )
            ->where([
                ['bm.request_id', '=', $request_id],
                ['bm.approval', '=', 'Approve'] // Tambahkan filter ini
            ])
            ->get();

        return response()->json($detail);
    }

    public function approve($id)
    {
        try {
            $user = Session::get('user');
            $barangMasuk = BarangmasukModel::with(['user'])->find($id);

            // Cek divisi dan departemen dari user pembuat request
            if (
                $barangMasuk->user->divisi != $user->divisi ||
                $barangMasuk->user->departemen != $user->departemen
            ) {
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
            if (
                $barangMasuk->user->divisi != $user->divisi ||
                $barangMasuk->user->departemen != $user->departemen
            ) {
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
            DB::beginTransaction();

            if (empty($request->request_id) || empty($request->approvals)) {
                throw new \Exception('Data tidak lengkap');
            }

            // Update individual items
            foreach ($request->approvals as $bm_id => $status) {
                DB::table('tbl_barangmasuk')
                    ->where('bm_id', $bm_id)
                    ->update([
                        'tracking_status' => $status,
                        'updated_at' => now()
                    ]);
            }

            // Cek status semua item dalam request
            $allItems = DB::table('tbl_barangmasuk')
                ->where('request_id', $request->request_id)
                ->where('approval', 'Approve')
                ->pluck('tracking_status');

            // Tentukan status request berdasarkan status item
            if ($allItems->every(function ($status) {
                return $status === 'Diterima';
            })) {
                $newStatus = 'Diterima';
            } elseif ($allItems->contains('Dikirim')) {
                $newStatus = 'Dikirim';
            } elseif ($allItems->contains('Diproses')) {
                $newStatus = 'Diproses';
            } else {
                $newStatus = DB::table('tbl_request_barang')
                    ->where('request_id', $request->request_id)
                    ->value('status');
            }

            // Update request status
            DB::table('tbl_request_barang')
                ->where('request_id', $request->request_id)
                ->update([
                    'status' => $newStatus,
                    'updated_at' => now()
                ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Status tracking berhasil diupdate'
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
    public function updateStatus(Request $request)
    {
        try {
            DB::beginTransaction();

            // Update status barang
            DB::table('tbl_barangmasuk')
                ->where('bm_id', $request->bm_id)
                ->update([
                    'tracking_status' => $request->status,
                    'updated_at' => now()
                ]);

            // Get request_id
            $barangMasuk = DB::table('tbl_barangmasuk')
                ->where('bm_id', $request->bm_id)
                ->first();

            // Update status request berdasarkan status semua item
            $allItems = DB::table('tbl_barangmasuk')
                ->where('request_id', $barangMasuk->request_id)
                ->pluck('tracking_status');

            // Tentukan status request
            if ($allItems->every(function ($status) {
                return $status === 'Diterima';
            })) {
                $newStatus = 'Diterima';
            } elseif ($allItems->contains('Dikirim')) {
                $newStatus = 'Dikirim';
            } elseif ($allItems->contains('Diproses')) {
                $newStatus = 'Diproses';
            } else {
                $newStatus = 'approved';
            }

            // Update request
            DB::table('tbl_request_barang')
                ->where('request_id', $barangMasuk->request_id)
                ->update([
                    'status' => $newStatus,
                    'updated_at' => now()
                ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in updateStatus:', [
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
