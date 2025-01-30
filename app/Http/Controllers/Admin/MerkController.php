<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AksesModel;
use App\Models\Admin\MerkModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class MerkController extends Controller
{
    public function index()
    {
        $data["title"] = "Merk";
        $data["hakTambah"] = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_submenu.submenu_judul' => 'Merk', 'tbl_akses.akses_type' => 'create'))->count();
        return view('Admin.Merk.index', $data);
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = MerkModel::leftJoin('tbl_jenisbarang', 'tbl_jenisbarang.jenisbarang_id', '=', 'tbl_merk.jenisbarang_id')
                ->select('tbl_merk.*', 'tbl_jenisbarang.jenisbarang_nama')
                ->orderBy('tbl_merk.merk_id', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenisbarang', function ($row) {
                    return $row->jenisbarang_nama ?? '-';
                })
                ->addColumn('ket', function ($row) {
                    $ket = $row->merk_keterangan == '' ? '-' : $row->merk_keterangan;
                    return $ket;
                })
                ->addColumn('action', function ($row) {
                    $array = array(
                        "merk_id" => $row->merk_id,
                        "merk_nama" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->merk_nama)),
                        "merk_keterangan" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->merk_keterangan)),
                        "jenisbarang_id" => $row->jenisbarang_id
                    );
                    $button = '';
                    $hakEdit = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')
                        ->where(array(
                            'tbl_akses.role_id' => Session::get('user')->role_id,
                            'tbl_submenu.submenu_judul' => 'Merk',
                            'tbl_akses.akses_type' => 'update'
                        ))->count();
                    $hakDelete = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')
                        ->where(array(
                            'tbl_akses.role_id' => Session::get('user')->role_id,
                            'tbl_submenu.submenu_judul' => 'Merk',
                            'tbl_akses.akses_type' => 'delete'
                        ))->count();

                    if ($hakEdit > 0 && $hakDelete > 0) {
                        $button .= '
                        <div class="g-2">
                            <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                            <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>';
                    } else if ($hakEdit > 0 && $hakDelete == 0) {
                        $button .= '
                        <div class="g-2">
                            <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        </div>';
                    } else if ($hakEdit == 0 && $hakDelete > 0) {
                        $button .= '
                        <div class="g-2">
                            <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>';
                    } else {
                        $button .= '-';
                    }
                    return $button;
                })
                ->rawColumns(['action', 'ket', 'jenisbarang'])
                ->make(true);
        }
    }

    public function proses_tambah(Request $request)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->merk)));

        //insert data
        MerkModel::create([
            'merk_nama' => $request->merk,
            'merk_slug' => $slug,
            'merk_keterangan' => $request->ket,
            'jenisbarang_id' => $request->jenisbarang_id  // Tambah ini
        ]);

        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_ubah(Request $request, MerkModel $merk)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->merk)));

        //update data
        $merk->update([
            'merk_nama' => $request->merk,
            'merk_slug' => $slug,
            'merk_keterangan' => $request->ket,
            'jenisbarang_id' => $request->jenisbarang_id  // Tambah ini
        ]);

        return response()->json(['success' => 'Berhasil']);
    }


    public function proses_hapus(Request $request, MerkModel $merk)
    {
        //delete
        $merk->delete();

        return response()->json(['success' => 'Berhasil']);
    }
    public function getByJenis($jenisbarang_id)
    {
        try {
            $merk = MerkModel::where('jenisbarang_id', $jenisbarang_id)
                ->select('merk_id', 'merk_nama')
                ->orderBy('merk_nama', 'asc')
                ->get();
            return response()->json($merk);
        } catch (\Exception $e) {
            return response()->json([]);
        }
    }

    public function viewList()
    {
        $data = [
            "title" => "Daftar Merk Barang",
            "merk" => MerkModel::leftJoin('tbl_jenisbarang', 'tbl_jenisbarang.jenisbarang_id', '=', 'tbl_merk.jenisbarang_id')
                ->select('tbl_merk.*', 'tbl_jenisbarang.jenisbarang_nama')
                ->orderBy('merk_nama', 'ASC')
                ->get()
        ];
        return view('Admin.Merk.view', $data);
    }
}
