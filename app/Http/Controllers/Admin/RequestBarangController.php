<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Admin\AksesModel;
use App\Models\Admin\BarangmasukModel;
use App\Models\Admin\BarangModel;
use App\Models\Admin\CustomerModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RequestBarangController extends Controller
{
    public function index()
    {
        $data["title"] = "Request Barang";
        $data["hakTambah"] = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')
            ->where([
                'tbl_akses.role_id' => Session::get('user')->role_id,
                'tbl_submenu.submenu_judul' => 'Request Barang',
                'tbl_akses.akses_type' => 'create'
            ])->count();

        return view('Admin.Request.request', $data); // Pastikan path view sesuai
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_request_barang as r')
                ->leftJoin('tbl_user as u', 'u.user_id', '=', 'r.user_id')
                ->select('r.*', 'u.user_nmlengkap as user_nama')
                ->orderBy('r.created_at', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal', function ($row) {
                    return $row->tanggal ? Carbon::parse($row->tanggal)->translatedFormat('d F Y') : '-';
                })
                ->addColumn('user', function ($row) {
                    return $row->user_nama ?? '-';
                })
                ->addColumn('status', function ($row) {
                    $badge = match ($row->status) {
                        'draft' => '<span class="badge bg-warning">Draft</span>',
                        'pending' => '<span class="badge bg-info">Pending</span>',
                        'approved' => '<span class="badge bg-success">Approved</span>',
                        'rejected' => '<span class="badge bg-danger">Rejected</span>',
                        default => '-',
                    };
                    return $badge;
                })
                ->addColumn('action', function ($row) {
                    $array = [
                        'request_id' => $row->request_id,
                        'request_kode' => $row->request_kode,
                        'status' => $row->status,
                    ];

                    // Cek apakah request_id sudah ada di tbl_barangmasuk
                    $exists = DB::table('tbl_barangmasuk')->where('request_id', $row->request_id)->exists();

                    if (!$exists) {
                        return '<button onclick="hapus(' . json_encode($array) . ')" class="btn btn-sm btn-danger">Delete</button>';
                    }

                    return '-'; // Jika sudah ada di tbl_barangmasuk, tidak ada tombol delete
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function getDetails($id)
    {
        try {
            // Get request details
            $request = DB::table('tbl_request_barang as r')
                ->leftJoin('tbl_user as u', 'u.user_id', '=', 'r.user_id')
                ->where('r.request_id', $id)
                ->select('r.*', 'u.user_nmlengkap', 'u.departemen')
                ->first();

            if (!$request) {
                return response()->json([
                    'success' => false,
                    'message' => 'Request tidak ditemukan'
                ], 404);
            }

            // Get items from barangmasuk with barang details for this request
            $items = DB::table('tbl_barangmasuk as bm')
                ->leftJoin('tbl_barang as b', 'b.barang_kode', '=', 'bm.barang_kode')
                ->where('bm.request_id', $id)
                ->select(
                    'bm.*',
                    'b.barang_nama',
                    DB::raw('(bm.bm_jumlah * bm.harga) as total_harga'),
                    'bm.keterangan', // Make sure keterangan is selected
                    'bm.tracking_status as item_status'
                )
                ->get();

            // Calculate totals
            $totalItems = $items->count();
            $totalHarga = $items->sum('total_harga');

            return response()->json([
                'success' => true,
                'request' => $request,
                'items' => $items,
                'total_items' => $totalItems,
                'total_harga' => $totalHarga
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getDetails: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function hapus(Request $request)
    {
        try {
            // Pastikan request_id tidak digunakan di tbl_barangmasuk
            $exists = DB::table('tbl_barangmasuk')->where('request_id', $request->request_id)->exists();

            if ($exists) {
                return response()->json(['success' => false, 'message' => 'Request ID sudah digunakan di barang masuk, tidak bisa dihapus.']);
            }

            DB::table('tbl_request_barang')
                ->where('request_id', $request->request_id)
                ->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function generateRequestId()
    {
        // Ambil user dan divisi
        $user = Session::get('user');
        $divisiCode = $this->getDivisionCode($user->divisi);

        // Format: nomor-divisi-bulan-tahun
        $year = date('Y');
        $month = date('m');

        // Cari nomor terakhir untuk bulan dan tahun ini
        $lastRequest = DB::table('tbl_request_barang')
            ->where('request_id', 'LIKE', "%-$divisiCode-$month-$year")
            ->orderBy('request_id', 'DESC')
            ->first();

        $number = '01';
        if ($lastRequest) {
            $lastNumber = explode('-', $lastRequest->request_id)[0];
            $number = str_pad((int)$lastNumber + 1, 2, '0', STR_PAD_LEFT);
        }

        return "$number-$divisiCode-$month-$year";
    }

    private function getDivisionCode($division)
    {
        return match ($division) {
            'Building Management' => 'BM',
            'Construction and Property' => 'CP',
            'IT Business and Solution' => 'ITBS',
            'Finance and Accounting' => 'FA',
            'Human Capital and General Affair' => 'HCGA',
            'Risk, System, and Compliance' => 'RSC',
            'Internal Audit' => 'IA',
            default => 'XX'
        };
    }


    // public function store(Request $request)
    // {
    //     try {
    //         if (!Session::has('user')) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Silakan login terlebih dahulu'
    //             ], 401);
    //         }

    //         $user = Session::get('user');
    //         $requestCode = $this->generateRequestCode();

    //         // Insert header data dengan tanggal hari ini
    //         $inserted = DB::table('tbl_request_barang')->insert([
    //             'request_id' => $requestCode,
    //             'request_kode' => $requestCode,
    //             'request_tanggal' => now(), // Set tanggal hari ini
    //             'user_id' => $user->user_id,
    //             'departemen' => $user->departemen ?? 'DEFAULT',
    //             'status' => 'draft',
    //             'keterangan' => 'Request Barang Baru',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);

    //         DB::commit();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Request barang berhasil ditambahkan',
    //             'data' => ['request_kode' => $requestCode]
    //         ]);

    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         Log::error('Error saat menyimpan request barang:', [
    //             'message' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ]);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = Session::get('user');
            $requestId = $this->generateRequestId();

            DB::table('tbl_request_barang')->insert([
                'request_id' => $requestId,
                'user_id' => $user->user_id,
                'request_tanggal' => date('Y-m-d'),
                'departemen' => $user->departemen,
                'divisi' => $user->divisi, 
                'status' => 'draft',
                'keterangan' => 'Request Barang Baru',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Request berhasil ditambahkan']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $user = Session::get('user');

            // Query dasar
            $query = DB::table('tbl_request_barang as r')
                ->leftJoin('tbl_user as u', 'u.user_id', '=', 'r.user_id')
                ->select([
                    'r.request_id',
                    'r.request_tanggal',
                    'r.departemen',
                    'r.status',
                    'r.created_at',
                    DB::raw('(SELECT COUNT(1) FROM tbl_barangmasuk WHERE request_id = r.request_id) > 0 as has_barang_masuk')
                ]);

            // Jika role_id = 5 (User), hanya tampilkan request miliknya
            if ($user->role_id == 5) {
                $query->where('r.user_id', $user->user_id);
            }

            $query->orderBy('r.created_at', 'DESC');

            return DataTables::of($query)
                ->addIndexColumn() // This line is already correct
                // Update DT_RowIndex definition
                ->addColumn('DT_RowIndex', function ($row) {
                    static $index = 1;
                    return $index++;
                })
                ->addColumn('tanggal_format', function ($row) {
                    return date('d F Y', strtotime($row->request_tanggal));
                })
                ->addColumn('status', function ($row) {
                    $badge = '';
                    switch ($row->status) {
                        case 'draft':
                            $badge = '<span class="badge bg-warning">Draft</span>';
                            break;
                        case 'pending':
                            $badge = '<span class="badge bg-info">Pending</span>';
                            break;
                        case 'approved':
                            $badge = '<span class="badge bg-success">Approved</span>';
                            break;
                        case 'rejected':
                            $badge = '<span class="badge bg-danger">Rejected</span>';
                            break;
                        case 'Diproses':
                            $badge = '<span class="badge bg-primary">Diproses</span>';
                            break;
                        case 'Dikirim':
                            $badge = '<span class="badge bg-info">Dikirim</span>';
                            break;
                        case 'Diterima':
                            $badge = '<span class="badge bg-success">Diterima</span>';
                            break;
                    }
                    return $badge;
                })
                ->addColumn('action', function ($row) use ($user) {
                    $buttons = '';

                    // Add Tambah Barang Masuk button if status is draft
                    if ($row->status === 'draft') {
                        $buttons .= '<button onclick="addBarangMasuk(\'' . $row->request_id . '\')" class="btn btn-sm btn-success me-2">
                        <i class="fe fe-plus"></i> Tambah Barang Masuk
                    </button>';
                    }

                    // Only show delete button if:
                    // 1. There are no barang masuk records
                    // 2. For role_id = 5, only show if status is 'draft'
                    if (!$row->has_barang_masuk) {
                        if ($user->role_id == 5) {
                            if ($row->status == 'draft') {
                                $buttons .= '<button onclick="deleteRequest(\'' . $row->request_id . '\')" class="btn btn-sm btn-danger">
                                <i class="fe fe-trash"></i> Delete
                            </button>';
                            }
                        } else {
                            $buttons .= '<button onclick="deleteRequest(\'' . $row->request_id . '\')" class="btn btn-sm btn-danger">
                            <i class="fe fe-trash"></i> Delete
                        </button>';
                        }
                    }

                    // If no buttons, return a dash
                    return $buttons ?: '-';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function proses_tambah(Request $request)
    {
        try {
            $user = auth()->user();

            DB::table('tbl_request_barang')->insert([
                'request_kode' => $request->request_kode,
                'tanggal' => $request->tanggal,
                'user_id' => $user->user_id,
                'departemen' => $user->departemen,
                'status' => 'draft',
                'keterangan' => $request->keterangan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function proses_hapus(Request $request)
    {
        try {
            DB::table('tbl_request_barang')
                ->where('request_id', $request->request_id)
                ->delete();

            return response()->json(['success' => 'Berhasil']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function detail($id)
    {
        // Cek apakah request ini milik user yang login
        $header = DB::table('tbl_request_barang as r')
            ->join('tbl_user as u', 'r.user_id', '=', 'u.user_id')
            ->select('r.*', 'u.user_nmlengkap', 'u.departemen')
            ->where('r.request_id', $id)
            ->where('r.user_id', auth()->user()->user_id)
            ->first();

        if (!$header) {
            return redirect()->route('request-barang')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Request Barang',
            'header' => $header,
            'hakTambah' => 1,
        ];

        return view('Admin.Request.detail', $data);
    }

    public function getdetail($id)
    {
        // Query untuk mendapatkan detail barang dalam satu request
        $data = DB::table('tbl_request_barang_detail as d')
            ->where('d.request_id', $id)
            ->orderBy('d.created_at', 'ASC');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('harga_format', function ($row) {
                return "Rp " . number_format($row->harga, 0, ',', '.');
            })
            ->addColumn('total', function ($row) {
                $total = $row->jumlah * $row->harga;
                return "Rp " . number_format($total, 0, ',', '.');
            })
            ->addColumn('action', function ($row) {
                $request = DB::table('tbl_request_barang')
                    ->where('request_id', $row->request_id)
                    ->first();

                $btn = '';
                // Tombol edit dan hapus hanya untuk status draft
                if ($request && $request->status == 'draft') {
                    $btn .= '<button onclick="editItem(\'' . $row->request_detail_id . '\')" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fa fa-edit"></i>
                            </button> ';
                    $btn .= '<button onclick="hapusItem(\'' . $row->request_detail_id . '\')" class="btn btn-danger btn-sm" title="Hapus">
                            <i class="fa fa-trash"></i>
                            </button>';
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function storeItem(Request $request)
    {
        try {
            DB::beginTransaction();

            // Simpan detail barang baru
            DB::table('tbl_request_barang_detail')->insert([
                'request_detail_id' => $request->request_id . '-' . time(), // Generate unique ID
                'request_id' => $request->request_id,
                'barang_kode' => $request->barang_kode,
                'jumlah' => $request->jumlah,
                'harga' => str_replace('.', '', $request->harga),
                'keterangan' => $request->keterangan,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Item berhasil ditambahkan']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function updateItem(Request $request)
    {
        try {
            DB::beginTransaction();

            DB::table('tbl_request_barang_detail')
                ->where('request_detail_id', $request->request_detail_id)
                ->update([
                    'barang_kode' => $request->barang_kode,
                    'jumlah' => $request->jumlah,
                    'harga' => str_replace('.', '', $request->harga),
                    'keterangan' => $request->keterangan,
                    'updated_at' => now()
                ]);

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Item berhasil diupdate']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function deleteItem(Request $request)
    {
        try {
            DB::beginTransaction();

            DB::table('tbl_request_barang_detail')
                ->where('request_detail_id', $request->request_detail_id)
                ->delete();

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Item berhasil dihapus']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();

            $requestId = $request->request_id;

            // Check if there are any barang masuk records
            $hasBarangMasuk = DB::table('tbl_barangmasuk')
                ->where('request_id', $requestId)
                ->exists();

            if ($hasBarangMasuk) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus request karena memiliki data barang masuk!'
                ], 400);
            }

            // If no barang masuk records exist, proceed with deletion
            $deleted = DB::table('tbl_request_barang')
                ->where('request_id', $requestId)
                ->delete();

            if (!$deleted) {
                throw new \Exception('Request tidak ditemukan');
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Request berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            DB::beginTransaction();

            DB::table('tbl_request_barang')
                ->where('request_id', $request->request_id)
                ->where('user_id', auth()->user()->user_id)
                ->update([
                    'status' => $request->status,
                    'updated_at' => now()
                ]);

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Status berhasil diupdate']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function getBarang(Request $request)
    {
        if ($request->ajax()) {
            $data = BarangModel::orderBy('barang_id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function ($row) {
                    if ($row->barang_gambar != 'image.png') {
                        $img = '<img src="' . asset('storage/barang/' . $row->barang_gambar) . '" width="50">';
                    } else {
                        $img = '<img src="' . url('/assets/default/barang/image.png') . '" width="50">';
                    }
                    return $img;
                })
                ->addColumn('action', function ($row) {
                    return '<button onclick="pilihBarang(\'' . $row->barang_kode . '\')" class="btn btn-primary btn-sm">Pilih</button>';
                })
                ->rawColumns(['action', 'img'])
                ->make(true);
        }
    }

    public function checkRequestStatus()
    {
        try {
            $user = Session::get('user');

            // Get user's latest request status
            $latestRequest = DB::table('tbl_request_barang')
                ->where('user_id', $user->user_id)
                ->orderBy('created_at', 'desc')
                ->first();

            if (!$latestRequest) {
                // If no requests exist, allow creating new request
                return response()->json([
                    'success' => true,
                    'can_create_request' => true,
                    'can_add_barang' => false,
                    'message' => null
                ]);
            }

            // Check if status is draft or pending
            $isPendingOrDraft = in_array($latestRequest->status, ['draft', 'pending']);

            return response()->json([
                'success' => true,
                'can_create_request' => !$isPendingOrDraft,
                'can_add_barang' => true,
                'current_status' => $latestRequest->status,
                'message' => $isPendingOrDraft ? 'Anda masih memiliki request yang belum selesai' : null
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memeriksa status'
            ], 500);
        }
    }
}
