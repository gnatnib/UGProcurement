<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangmasukModel;
use App\Models\Admin\SignatureModel;
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
        $role_id = Session::get('user')->role_id;
        if ($role_id != 4 && $role_id != 1) {
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
                ->addColumn('tanggal_format', function ($row) {
                    return Carbon::parse($row->request_tanggal)->format('d/m/Y');
                })
                ->addColumn('status_badge', function ($row) {
                    switch ($row->status) {
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
                ->addColumn('action', function ($row) {
                    // Untuk requests yang belum disetujui/ditolak
                    if ($row->status != 'approved' && $row->status != 'rejected') {
                        return '<button class="btn btn-success btn-sm" onclick="showDetail(\'' . $row->request_id . '\')">
                                <i class="fe fe-eye"></i> Detail
                               </button>';
                    }
                    // Untuk requests yang sudah disetujui/ditolak
                    return '<button class="btn btn-info btn-sm" onclick="showDetail(\'' . $row->request_id . '\')">
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

            // Validasi data
            if (empty($request->request_id) || empty($request->approvals)) {
                throw new \Exception('Data tidak lengkap');
            }

            // Update barangmasuk records
            foreach ($request->approvals as $bm_id => $status) {
                $updated = DB::table('tbl_barangmasuk')
                    ->where('bm_id', $bm_id)
                    ->update([
                        'approval' => $status,
                        'tracking_status' => $status === 'Approve' ? 'Diproses' : 'Ditolak',
                        'updated_at' => now()
                    ]);
            }

            // Update request status to 'Diproses' instead of 'approved'
            $updated = DB::table('tbl_request_barang')
                ->where('request_id', $request->request_id)
                ->update([
                    'status' => 'Diproses', // Changed from 'approved' to 'Diproses'
                    'updated_at' => now()
                ]);

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


    public function storeSignature(Request $request)
    {
        try {
            DB::beginTransaction();

            $signature = new SignatureModel();
            $signature->request_id = $request->request_id;
            $signature->user_id = Session::get('user')->user_id;
            $signature->role_id = Session::get('user')->role_id;
            $signature->signature = $request->signature;
            $signature->action = 'Approve';
            $signature->save();

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function viewSignature($request_id)
    {
        $signature = SignatureModel::where('request_id', $request_id)->first();
        if (!$signature) {
            abort(404);
        }

        // Check if it's already a full base64 string
        if (strpos($signature->signature, 'data:image/png;base64,') === 0) {
            $imageData = substr($signature->signature, strpos($signature->signature, ',') + 1);
        } else {
            $imageData = $signature->signature;
        }

        try {
            $decodedImage = base64_decode($imageData);
            if ($decodedImage === false) {
                abort(400, 'Invalid image data');
            }

            return response($decodedImage)
                ->header('Content-Type', 'image/png');
        } catch (\Exception $e) {
            Log::error('Signature decode error: ' . $e->getMessage());
            abort(500, 'Error processing signature');
        }
    }

    public function setItemStatus($bm_id, $status)
    {
        try {
            // Check if item has signature
            $hasSignature = SignatureModel::where('bm_id', $bm_id)->exists();

            if (!$hasSignature && $status === 'Approve') {
                return response()->json([
                    'success' => false,
                    'message' => 'Signature required before approval'
                ], 400);
            }

            DB::table('tbl_barangmasuk')
                ->where('bm_id', $bm_id)
                ->update([
                    'approval' => $status,
                    'updated_at' => now()
                ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
