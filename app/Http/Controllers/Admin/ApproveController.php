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
        if ($role_id != 2 && $role_id != 4) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        $data["departemen"] = DB::table('tbl_user')
            ->select('departemen')
            ->distinct()
            ->whereNotNull('departemen')
            ->pluck('departemen');

        $data["title"] = "Approval";
        return view('Admin.Approval.approval', $data);
    }

    public function show(Request $request)
{
    if ($request->ajax()) {
        $user = Session::get('user');

        try {
            $query = DB::table('tbl_request_barang as r')
                ->leftJoin('tbl_user as creator', 'creator.user_id', '=', 'r.user_id')
                ->leftJoin('tbl_barangmasuk as bm', 'bm.request_id', '=', 'r.request_id')
                ->select(
                    'r.request_id',
                    'r.request_tanggal', 
                    'creator.divisi',
                    'creator.departemen',
                    'r.status'
                )
                ->whereNotNull('r.request_id');

            // Apply filters
            if ($request->filled('departemen')) {
                $query->where('creator.departemen', $request->departemen);
            }

            if ($request->filled('bulan')) {
                $query->whereMonth('r.request_tanggal', $request->bulan);
            }

            if ($request->filled('tahun')) {
                $query->whereYear('r.request_tanggal', $request->tahun);
            }

            // Role-based filtering
            if ($user->role_id == 4) {
                $query->where([
                    ['creator.divisi', 'LIKE', trim($user->divisi)],
                    ['creator.departemen', '=', $user->departemen]
                ]);
            }

            $data = $query->groupBy(
                'r.request_id',
                'r.request_tanggal',
                'creator.divisi',
                'creator.departemen',
                'r.status'
            )
            ->orderBy('r.request_tanggal', 'DESC')
            ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal_format', function ($row) {
                    return Carbon::parse($row->request_tanggal)->format('d/m/Y');
                })
                ->addColumn('status_badge', function ($row) {
                    switch ($row->status) {
                        case 'draft':
                            return '<span class="badge bg-secondary">Draft</span>';
                        case 'pending':
                            return '<span class="badge bg-warning">Pending</span>';
                        case 'approved':
                            return '<span class="badge bg-success">Disetujui</span>';
                        case 'rejected':
                            return '<span class="badge bg-danger">Ditolak</span>';
                        case 'Diproses':
                            return '<span class="badge bg-info">Diproses</span>';
                        case 'Dikirim':
                            return '<span class="badge bg-primary">Dikirim</span>';
                        case 'Diterima':
                            return '<span class="badge bg-success">Diterima</span>';
                        default:
                            return '<span class="badge bg-warning">Pending</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-success btn-sm" onclick="showDetail(\'' . $row->request_id . '\')">
                        <i class="fe fe-eye"></i> Detail
                    </button>';
                })
                ->rawColumns(['action', 'status_badge'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('Error in approval show:', [
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
        try {
            $detail = DB::table('tbl_barangmasuk as bm')
                ->join('tbl_barang as b', 'b.barang_kode', '=', 'bm.barang_kode')
                ->leftJoin('tbl_request_barang as r', 'r.request_id', '=', 'bm.request_id')
                ->select(
                    'bm.*',
                    'b.barang_nama',
                    'r.status as request_status'
                )
                ->where('bm.request_id', $request_id)
                ->get();

            if ($detail->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No items found for this request'
                ]);
            }

            return response()->json($detail);
        } catch (\Exception $e) {
            Log::error('Error in getDetail:', [
                'request_id' => $request_id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error retrieving details'
            ], 500);
        }
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

            $user = Session::get('user');

            // Check for user's signature before allowing bulk update
            $hasUserSignature = SignatureModel::where([
                'request_id' => $request->request_id,
                'role_id' => $user->role_id
            ])->exists();

            if (!$hasUserSignature) {
                throw new \Exception('Please sign the request before approving items');
            }

            // Validasi data
            if (empty($request->request_id) || empty($request->approvals)) {
                throw new \Exception('Data tidak lengkap');
            }

            // Update barangmasuk records
            foreach ($request->approvals as $bm_id => $approval) {
            $updateData = [
                'approval' => $approval['status'],
                'tracking_status' => $approval['status'] === 'Approve' ? 'Diproses' : 'Ditolak',
                'updated_at' => now()
            ];

            if ($approval['status'] === 'Reject' && !empty($approval['reason'])) {
                $updateData['keterangan'] = $approval['reason'];
            }

            DB::table('tbl_barangmasuk')
                ->where('bm_id', $bm_id)
                ->update($updateData);
            }

            // Check if both signatures exist for status update
            $gmSignature = SignatureModel::where([
                'request_id' => $request->request_id,
                'signer_type' => 'GM'
            ])->exists();

            $gmhcgaSignature = SignatureModel::where([
                'request_id' => $request->request_id,
                'signer_type' => 'GMHCGA'
            ])->exists();

            // Only update request status to 'Diproses' if both signatures exist
            if ($gmSignature && $gmhcgaSignature) {
                DB::table('tbl_request_barang')
                    ->where('request_id', $request->request_id)
                    ->update([
                        'status' => 'Diproses',
                        'updated_at' => now()
                    ]);
            } else {
                // Update to pending if not all signatures are present
                DB::table('tbl_request_barang')
                    ->where('request_id', $request->request_id)
                    ->update([
                        'status' => 'pending',
                        'updated_at' => now()
                    ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Status approval berhasil diupdate',
                'hasAllSignatures' => ($gmSignature && $gmhcgaSignature)
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

            $user = Session::get('user');
            $signatureData = $request->signature;

            // Remove the data:image/png;base64, prefix if it exists
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strpos($signatureData, ',') + 1);
            }

            // Determine signer type
            $signerType = $user->role_id == 2 ? 'GMHCGA' : 'GM';

            // Check if this type of signature already exists for this request
            $existingSignature = SignatureModel::where([
                'request_id' => $request->request_id,
                'signer_type' => $signerType
            ])->first();

            if ($existingSignature) {
                throw new \Exception('Signature already exists for this role');
            }

            $signature = new SignatureModel();
            $signature->request_id = $request->request_id;
            $signature->user_id = $user->user_id;
            $signature->role_id = $user->role_id;
            $signature->signature = $signatureData;
            $signature->action = 'Approve';
            $signature->signer_type = $signerType;
            $signature->save();

            // Check if both signatures exist
            $gmSignature = SignatureModel::where([
                'request_id' => $request->request_id,
                'signer_type' => 'GM'
            ])->exists();

            $gmhcgaSignature = SignatureModel::where([
                'request_id' => $request->request_id,
                'signer_type' => 'GMHCGA'
            ])->exists();

            // If both signatures exist, update the request status
            if ($gmSignature && $gmhcgaSignature) {
                DB::table('tbl_request_barang')
                    ->where('request_id', $request->request_id)
                    ->update([
                        'status' => 'Diproses',
                        'updated_at' => now()
                    ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'hasAllSignatures' => $gmSignature && $gmhcgaSignature
            ]);
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
        try {
            $signatures = SignatureModel::where('request_id', $request_id)->get();

            // If no signatures exist, return empty array instead of 404
            if ($signatures->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'signatures' => []
                ]);
            }

            $signatureData = [];
            foreach ($signatures as $signature) {
                $imageData = $signature->signature;
                if (strpos($imageData, 'data:image/png;base64,') !== 0) {
                    $imageData = 'data:image/png;base64,' . $imageData;
                }
                $signatureData[] = [
                    'signature' => $imageData,
                    'signer_type' => $signature->signer_type,
                    'user_id' => $signature->user_id
                ];
            }

            return response()->json([
                'success' => true,
                'signatures' => $signatureData
            ]);
        } catch (\Exception $e) {
            Log::error('Signature decode error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error processing signature'
            ], 500);
        }
    }

    public function setItemStatus($bm_id, $status)
    {
        try {
            $barangMasuk = BarangmasukModel::find($bm_id);

            // Check if there's a signature for this request
            $hasSignature = SignatureModel::where([
                'request_id' => $barangMasuk->request_id,
                'role_id' => Session::get('user')->role_id
            ])->exists();

            if (!$hasSignature && $status === 'Approve') {
                return response()->json([
                    'success' => false,
                    'message' => 'Please sign the request before approving items'
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
