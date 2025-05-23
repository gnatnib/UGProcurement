<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AksesModel;
use App\Models\Admin\BarangmasukModel;
use App\Models\Admin\BarangModel;
use App\Models\Admin\CustomerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BarangmasukController extends Controller
{
    public function index()
    {
        $data["title"] = "Barang Masuk";
        $data["hakTambah"] = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')
            ->where(array(
                'tbl_akses.role_id' => Session::get('user')->role_id,
                'tbl_submenu.submenu_judul' => 'Barang Masuk',
                'tbl_akses.akses_type' => 'create'
            ))->count();

        // Add this line to get satuan list
        $data["satuanList"] = DB::table('tbl_satuan')->orderBy('satuan_nama', 'ASC')->get();

        return view('Admin.BarangMasuk.index', $data);
    }

    public function create(Request $request)
    {
        try {
            $data["title"] = "Tambah Barang Masuk";
            $requestId = $request->query('request_id');

            // Validate if request_id exists and is in draft status
            $requestData = DB::table('tbl_request_barang')
                ->where('request_id', $requestId)
                ->where('status', 'draft')
                ->first();

            if (!$requestData) {
                return redirect()
                    ->route('request-barang.index')
                    ->with('error', 'Request tidak valid atau sudah diproses');
            }

            // Get user data from session
            $user = Session::get('user');
            $data["hakTambah"] = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')
                ->where([
                    'tbl_akses.role_id' => $user->role_id,
                    'tbl_submenu.submenu_judul' => 'Barang Masuk',
                    'tbl_akses.akses_type' => 'create'
                ])->count();

            // Add this line to get satuan list
            $data["satuanList"] = DB::table('tbl_satuan')->orderBy('satuan_nama', 'ASC')->get();

            $data["request_data"] = $requestData;
            $data["barangs"] = BarangModel::orderBy('barang_nama', 'ASC')->get();

            return view('Admin.BarangMasuk.index', $data);
        } catch (\Exception $e) {
            Log::error('Error in create method: ' . $e->getMessage());
            return redirect()
                ->route('request-barang.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $user = Session::get('user');
            $requestId = $request->query('request_id');

            $query = BarangmasukModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_barangmasuk.barang_kode')
                ->leftJoin('tbl_request_barang', 'tbl_request_barang.request_id', '=', 'tbl_barangmasuk.request_id')
                ->leftJoin('tbl_user', 'tbl_user.user_id', '=', 'tbl_barangmasuk.user_id')
                ->leftJoin('tbl_jenisbarang', 'tbl_jenisbarang.jenisbarang_id', '=', 'tbl_barang.jenisbarang_id')
                ->leftJoin('tbl_merk', 'tbl_merk.merk_id', '=', 'tbl_barang.merk_id')
                ->leftJoin('tbl_satuan', 'tbl_satuan.satuan_id', '=', 'tbl_barang.satuan_id');

            // Filter by request_id if provided
            if ($requestId) {
                $query->where('tbl_barangmasuk.request_id', $requestId);
            }

            $data = $query->select(
                'tbl_barangmasuk.*',
                'tbl_barang.barang_nama',
                'tbl_barang.barang_harga as harga', // Always get current price from master
                'tbl_request_barang.status as request_status',
                'tbl_jenisbarang.jenisbarang_nama as jenis',
                'tbl_merk.merk_nama as merk',
                'tbl_satuan.satuan_nama as satuan'
            )
                ->orderBy('tbl_barangmasuk.request_id', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    return $row->bm_tanggal ? Carbon::parse($row->bm_tanggal)->translatedFormat('d F Y') : '-';
                })
                ->addColumn('barang', function ($row) {
                    return $row->barang_nama ?? '-';
                })
                ->addColumn('jenis', function ($row) {
                    return $row->jenis ?? '-';
                })
                ->addColumn('merk', function ($row) {
                    return $row->merk ?? '-';
                })
                ->addColumn('jumlah_item', function ($row) {
                    return $row->bm_jumlah . ' ' . $row->satuan;
                })
                ->addColumn('harga', function ($row) {
                    return $row->harga; // This now returns current price from master
                })
                ->addColumn('approval', function ($row) {
                    return $row->approval ?? 'PENDING';
                })
                ->addColumn('tracking_status', function ($row) {
                    return $row->tracking_status ?? 'PENDING';
                })
                ->addColumn('action', function ($row) {
                    $array = array(
                        "bm_id" => $row->bm_id,
                        "bm_kode" => $row->bm_kode,
                        "barang_kode" => $row->barang_kode,
                        "user_id" => $row->user_id,
                        "bm_tanggal" => $row->bm_tanggal,
                        "bm_jumlah" => $row->bm_jumlah,
                        "satuan" => $row->satuan,
                        "keterangan" => $row->keterangan,
                    );

                    $button = '';
                    $hakEdit = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')
                        ->where([
                            'tbl_akses.role_id' => Session::get('user')->role_id,
                            'tbl_submenu.submenu_judul' => 'Barang Masuk',
                            'tbl_akses.akses_type' => 'update'
                        ])->count();

                    $hakDelete = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')
                        ->where([
                            'tbl_akses.role_id' => Session::get('user')->role_id,
                            'tbl_submenu.submenu_judul' => 'Barang Masuk',
                            'tbl_akses.akses_type' => 'delete'
                        ])->count();

                    if ($hakEdit > 0 && $hakDelete > 0) {
                        $button .= '
                    <div class="g-2">
                        <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                    </div>';
                    } else if ($hakEdit > 0) {
                        $button .= '
                    <div class="g-2">
                        <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                    </div>';
                    } else if ($hakDelete > 0) {
                        $button .= '
                    <div class="g-2">
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                    </div>';
                    } else {
                        $button .= '-';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function proses_tambah(Request $request)
    {
        try {
            $user = Session::get('user');

            $latestRequest = DB::table('tbl_request_barang')
                ->where('user_id', $user->user_id)
                ->orderBy('created_at', 'desc')
                ->first();

            if (!$latestRequest) {
                return response()->json([
                    'success' => false,
                    'title' => 'Tidak dapat menambah barang!',
                    'message' => 'Anda harus membuat request terlebih dahulu sebelum menambah barang masuk.',
                    'type' => 'warning'
                ], 400);
            }

            $barangmasuk = BarangmasukModel::create([
                'bm_tanggal' => $request->tglmasuk,
                'bm_kode' => $request->bmkode,
                'barang_kode' => $request->barang,
                'request_id' => $latestRequest->request_id,
                'keterangan' => $request->keterangan,
                'bm_jumlah' => $request->jml,
                'satuan' => $request->satuan,  // Add this
                'harga' => $request->harga,
                'user_id' => $user->user_id,
                'divisi' => $user->divisi,
                'status' => null,
                'approval' => null,
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error saving data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'title' => 'Error!',
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(),
                'type' => 'error'
            ], 500);
        }
    }


    public function proses_ubah(Request $request, BarangmasukModel $barangmasuk)
    {
        try {
            // Validate request
            $request->validate([
                'tglmasuk' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) {
                        $inputDate = Carbon::parse($value)->startOfDay();
                        $today = Carbon::now()->startOfDay();

                        if ($inputDate < $today) {
                            $fail('Tanggal tidak boleh kurang dari hari ini.');
                        }
                    },
                ],
                'barang' => 'required|string',
                'keterangan' => 'required|string',
                'jml' => 'required|numeric|min:1',
                'satuan' => 'required|string',
                'harga' => 'nullable|numeric|min:0'
            ]);

            // Check if barang exists
            $barang = DB::table('tbl_barang')->where('barang_kode', $request->barang)->first();
            if (!$barang) {
                return response()->json([
                    'success' => false,
                    'message' => 'Barang tidak ditemukan!'
                ], 404);
            }

            // Update data
            $barangmasuk->update([
                'bm_tanggal' => $request->tglmasuk,
                'barang_kode' => $request->barang,
                'keterangan' => $request->keterangan,
                'bm_jumlah' => $request->jml,
                'satuan' => $request->satuan,
                'harga' => $request->harga ?? 0,
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal: ' . $e->getMessage()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error updating barang masuk: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah data'
            ], 500);
        }
    }

    public function proses_hapus(Request $request, BarangmasukModel $barangmasuk)
    {
        //delete
        $barangmasuk->delete();

        return response()->json(['success' => 'Berhasil']);
    }
}
