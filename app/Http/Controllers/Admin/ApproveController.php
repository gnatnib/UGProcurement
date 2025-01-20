<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangmasukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

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
            $userDivisi = Session::get('user')->divisi; // Mengambil divisi dari user yang login

            $data = BarangmasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
                ->select('tbl_barangmasuk.*', 'tbl_barang.barang_nama')
                ->where('tbl_barangmasuk.divisi', $userDivisi) // Filter berdasarkan divisi
                ->orderBy('bm_id', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    return Carbon::parse($row->bm_tanggal)->format('d/m/Y');
                })
                ->addColumn('barang', function ($row) {
                    return $row->barang_nama;
                })
                ->addColumn('approval', function ($row) {
                    $approval = '';
                    switch($row->approval) {
                        case null:
                        case '':
                            $approval = '<span class="badge bg-warning">Pending</span>';
                            break;
                        case 'Approve':
                            $approval = '<span class="badge bg-success">Approved</span>';
                            break;
                        case 'Reject':
                            $approval = '<span class="badge bg-danger">Rejected</span>';
                            break;
                    }
                    return $approval;
                })
                ->addColumn('action', function ($row) {
                    if($row->approval == '' || $row->approval == null) {
                        return '
                        <div class="g-2">
                            <button class="btn btn-success btn-sm" onclick="approve('.$row->bm_id.')">
                                <i class="fe fe-check"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="reject('.$row->bm_id.')">
                                <i class="fe fe-x"></i>
                            </button>
                        </div>';
                    }
                    return '-';
                })
                ->rawColumns(['action', 'approval'])
                ->make(true);
        }
    }

    public function approve($id)
    {
        try {
            $barangMasuk = BarangmasukModel::find($id);
            
            // Tambahan pengecekan divisi
            if ($barangMasuk->divisi != Session::get('user')->divisi) {
                return response()->json(['success' => false, 'message' => 'Unauthorized access'], 403);
            }

            if (!$barangMasuk) {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }
            
            $barangMasuk->approval = 'Approve';
            $barangMasuk->save();

            return response()->json(['success' => true, 'message' => 'Successfully approved']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function reject($id)
    {
        try {
            $barangMasuk = BarangmasukModel::find($id);
            
            // Tambahan pengecekan divisi
            if ($barangMasuk->divisi != Session::get('user')->divisi) {
                return response()->json(['success' => false, 'message' => 'Unauthorized access'], 403);
            }

            if (!$barangMasuk) {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }
            
            $barangMasuk->approval = 'Reject';
            $barangMasuk->save();

            return response()->json(['success' => true, 'message' => 'Successfully rejected']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}