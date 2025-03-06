<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Admin\RoleModel;
use App\Models\Admin\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data["title"] = "User";
        $data["role"] = RoleModel::latest()->get();
        return view('Master.User.index', $data);
    }

    public function profile(UserModel $user)
    {
        $data["title"] = "Profile";
        $data["data"] = UserModel::leftJoin('tbl_role', 'tbl_role.role_id', '=', 'tbl_user.role_id')->select()->where('tbl_user.user_id', '=', $user->user_id)->first();
        return view('Master.User.profile', $data);
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = UserModel::leftJoin('tbl_role', 'tbl_role.role_id', '=', 'tbl_user.role_id')->select()->orderBy('user_id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function ($row) {
                    if ($row->user_foto == "undraw_profile.svg") {
                        $img = '<span class="avatar avatar-lg brround cover-image" data-bs-image-src="' . url('assets/images/users/14.jpg') . '" style="background: url(&quot;' . url('/assets/default/users') . '/' . $row->user_foto . '&quot;) center center;"></span>';
                    } else {
                        $img = '<span class="avatar avatar-lg brround cover-image" data-bs-image-src="' . url('assets/images/users/14.jpg') . '" style="background: url(&quot;' . asset('storage/users/' . $row->user_foto) . '&quot;) center center;"></span>';
                    }

                    return $img;
                })
                ->addColumn('role', function ($row) {
                    $badge = '<span class="badge bg-primary badge-sm  me-1 mb-1 mt-1">' . $row->role_title . '</span>';

                    return $badge;
                })
                ->addColumn('action', function ($row) {
                    $array = array(
                        "user_id" => $row->user_id,
                        "user_nama" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->user_nama)),
                        "user_nmlengkap" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->user_nmlengkap)),
                        "user_foto" => $row->user_foto,
                        "role_id" => $row->role_id,
                        "user_email" => $row->user_email
                    );
                    $button = '';
                    $button .= '
                    <div class="g-2">
                        <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                    </div>
                    ';
                    return $button;
                })
                ->rawColumns(['action', 'img', 'role'])->make(true);
        }
    }

    public function store(Request $request)
    {
        try {
            $img = $request->file('photo') ? $request->file('photo')->hashName() : "undraw_profile.svg";
            
            if($request->file('photo')) {
                $request->file('photo')->storeAs('public/users/', $img);
            }
    
            DB::beginTransaction();
    
            UserModel::create([
                'user_foto' => $img,
                'user_nmlengkap' => $request->nmlengkap,
                'user_nama' => $request->username,
                'user_email' => $request->email,
                'role_id' => $request->role,
                'divisi' => $request->divisi,      // Pastikan field ini ada
                'departemen' => $request->departemen, // Pastikan field ini ada
                'nomor_hp' => $request->nomor_hp ?? '-',
                'user_password' => md5($request->pwd)
            ]);
    
            DB::commit();
            
            return redirect()->route('user.index')
                ->with(['title' => 'User', 'status' => 'success', 'msg' => 'Berhasil ditambah!']);
                
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request, UserModel $user)
    {
        if ($request->hasFile('photoU')) {
            $image = $request->file('photoU');
            $image->storeAs('public/users', $image->hashName());
            Storage::delete('public/users/' . $user->user_foto);
    
            $updateData = [
                'user_foto' => $image->hashName(),
                'user_nmlengkap' => $request->nmlengkapU,
                'user_nama' => $request->usernameU,
                'user_email' => $request->emailU,
                'role_id' => $request->roleU,
                'divisi' => $request->divisiU,
                'departemen' => $request->departemenU,
                'nomor_hp' => $request->nomor_hpU ?? '-'
            ];
    
            if ($request->pwdU) {
                $updateData['user_password'] = md5($request->pwdU);
            }
    
            $user->update($updateData);
        } else {
            $updateData = [
                'user_nmlengkap' => $request->nmlengkapU,
                'user_nama' => $request->usernameU,
                'user_email' => $request->emailU,
                'role_id' => $request->roleU,
                'divisi' => $request->divisiU,
                'departemen' => $request->departemenU,
                'nomor_hp' => $request->nomor_hpU ?? '-'
            ];
    
            if ($request->pwdU) {
                $updateData['user_password'] = md5($request->pwdU);
            }
    
            $user->update($updateData);
        }
    
        return redirect()->route('user.index')->with([
            'title' => "User",
            'status' => 'success',
            'msg' => 'Berhasil diubah!'
        ]);
    }

    public function updatePassword(Request $request, UserModel $user)
    {
        $checkPassword = UserModel::where(array('user_id' => $user->user_id, 'user_password' => md5($request->currentpassword)))->count();
        if ($checkPassword > 0) {
            $user->update([
                'user_password' => md5($request->newpassword)
            ]);
            Session::flash('status', 'success');
            Session::flash('msg', 'Password berhasil di ubah!');
        } else {
            Session::flash('status', 'error');
            Session::flash('msg', 'Password saat ini tidak sama dengan password lama!');
            Session::flash('currentpassword', $request->currentpassword);
            Session::flash('newpassword', $request->newpassword);
            Session::flash('confirmpassword', $request->confirmpassword);
        }

        $data['title'] = "Profile";
        //redirect to index
        return redirect(url('admin/profile/' . $user->user_id))->with($data);
    }

    public function updateProfile(Request $request, UserModel $user)
{
    try {
        // Check if image is uploaded
        if ($request->hasFile('photoU')) {
            $image = $request->file('photoU');
            
            // Validate image
            $request->validate([
                'photoU' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);

            // Make sure storage directory exists
            $storage_path = storage_path('app/public/users');
            if (!file_exists($storage_path)) {
                mkdir($storage_path, 0755, true);
            }

            // Generate safe filename
            $filename = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
            
            // Store image
            $image->storeAs('public/users', $filename);

            // Delete old image if it exists and is not the default
            if ($user->user_foto != 'undraw_profile.svg' && Storage::exists('public/users/' . $user->user_foto)) {
                Storage::delete('public/users/' . $user->user_foto);
            }

            // Update user with new image
            $user->update([
                'user_foto' => $filename,
                'user_nmlengkap' => $request->nmlengkap,
                'user_nama' => $request->username,
                'user_email' => $request->email,
            ]);
        } else {
            // Update without changing image
            $user->update([
                'user_nmlengkap' => $request->nmlengkap,
                'user_nama' => $request->username,
                'user_email' => $request->email,
            ]);
        }

        Session::flash('status', 'success');
        Session::flash('msg', 'Profile Berhasil diubah!');

        return redirect(url('admin/profile/' . $user->user_id))->with(['title' => "Profile"]);

    } catch (\Exception $e) {
        Session::flash('status', 'error');
        Session::flash('msg', 'Gagal mengupdate profile: ' . $e->getMessage());
        
        return redirect()->back();
    }
}


    public function hapus(Request $request)
    {
        $detail = UserModel::findOrFail($request->iduser);

        //delete image
        Storage::delete('public/users/' . $detail->user_foto);

        //delete post
        UserModel::findOrFail($request->iduser)->delete();

        $data['title'] = "User";
        Session::flash('status', 'success');
        Session::flash('msg', 'Berhasil dihapus!');

        //redirect to index
        return redirect()->route('user.index')->with($data);
    }
}
