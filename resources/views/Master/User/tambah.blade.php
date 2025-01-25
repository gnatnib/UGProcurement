<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah User</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="{{ route('user.store') }}" name="myForm" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nmlengkap" class="form-control" placeholder="Nama Lengkap..">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username..">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email@mail.com..">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach($role as $r)
                                    <option value="{{$r->role_id}}">{{$r->role_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="nomor_hp" class="form-control" placeholder="Masukkan Nomor HP..">
                            </div>
                        </div>

                
                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Divisi</label>
                                <select name="divisi" class="form-control">
                                    <option value="">-- Pilih Divisi --</option>
                                    <option value="Building Management">Building Management</option>
                                    <option value="Construction and Property">Construction and Property</option>
                                    <option value="IT Business and Solution">IT Business and Solution</option>
                                    <option value="Finance and Accounting">Finance and Accounting</option>
                                    <option value="Human Capital and General Affair">Human Capital and General Affair</option>
                                    <option value="Risk, System, and Compliance">Risk, System, and Compliance</option>
                                    <option value="Internal Audit">Internal Audit</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Departemen</label>
                                <input type="text" name="departemen" class="form-control" placeholder="Masukkan Departemen..">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="pwd" class="form-control" placeholder="Password..">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Ulangi Password</label>
                                <input type="password" name="pwdU" class="form-control" placeholder="Password..">
                            </div>
                        </div>
                
                        <!-- Foto di Bawah -->
                        <div class="col-md-12 mt-3">
                            <div class="form-group text-center">
                                <label class="form-label">Foto</label>
                                <img src="{{url('/assets/default/users/undraw_profile.svg')}}" width="150px" alt="profile-user" id="outputImg" class="brround">
                                <input class="form-control mt-3" id="GetFile" name="photo" type="file" onchange="VerifyFileNameAndFileSize()" accept=".png,.jpeg,.jpg,.svg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan <i class="fe fe-check"></i></button>
                    <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Batal <i class="fe fe-x"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validateForm() {
    const namaL = document.forms["myForm"]["nmlengkap"].value;
    const user = document.forms["myForm"]["username"].value;
    const email = document.forms["myForm"]["email"].value;
    const role = document.forms["myForm"]["role"].value;
    const pwd = document.forms["myForm"]["pwd"].value;
    const kpwd = document.forms["myForm"]["pwdU"].value;
    const divisi = document.forms["myForm"]["divisi"].value;
    const departemen = document.forms["myForm"]["departemen"].value;

    resetValid();

    if (namaL == "") {
        validasi('Nama Lengkap wajib di isi!', 'warning');
        $("input[name='nmlengkap']").addClass('is-invalid');
        return false;
    } else if (user == '') {
        validasi('Username wajib di isi!', 'warning');
        $("input[name='username']").addClass('is-invalid');
        return false;
    } else if (email == '') {
        validasi('Email wajib di isi!', 'warning');
        $("input[name='email']").addClass('is-invalid');
        return false;
    } else if (role == '') {
        validasi('Role wajib di pilih!', 'warning');
        $("select[name='role']").addClass('is-invalid');
        return false;
    } else if (pwd == '') {
        validasi('Password wajib di isi!', 'warning');
        $("input[name='pwd']").addClass('is-invalid');
        $("input[name='pwdU']").addClass('is-invalid');
        return false;
    } else if (divisi == '') {
        validasi('Divisi wajib dipilih!', 'warning');
        $("select[name='divisi']").addClass('is-invalid');
        return false;
    } else if (departemen == '') {
        validasi('Departemen wajib diisi!', 'warning');
        $("input[name='departemen']").addClass('is-invalid');
        return false;
    } else if (pwd !== '' || kpwd !== '') {
        if (pwd.length < 6) {
            validasi('Panjang Password minimal 6 karakter!', 'warning');
            $("input[name='pwd']").addClass('is-invalid');
            $("input[name='pwdU']").addClass('is-invalid');
            return false;
        } else if (pwd !== kpwd) {
            validasi('Konfirmasi Password tidak sesuai!', 'warning');
            $("input[name='pwd']").addClass('is-invalid');
            $("input[name='pwdU']").addClass('is-invalid');
            return false;
        }
    }
    }

    function resetValid() {
        $("input[name='nmlengkap']").removeClass('is-invalid');
        $("input[name='username']").removeClass('is-invalid');
        $("input[name='email']").removeClass('is-invalid');
        $("input[name='role']").removeClass('is-invalid');
        $("input[name='pwd']").removeClass('is-invalid');
        $("input[name='pwdU']").removeClass('is-invalid');
    };

    function reset() {
        resetValid();
        $("input[name='nmlengkap']").val('');
        $("input[name='username']").val('');
        $("input[name='email']").val('');
        $("input[name='role']").val('');
        $("input[name='pwd']").val('');
        $("input[name='pwdU']").val('');
        $("#outputImg").attr("src", "{{url('/assets/default/users/undraw_profile.svg')}}");
        $("#GetFile").val('');
    }

    function fileIsValid(fileName) {
        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        var isValid = true;
        switch (ext) {
            case 'png':
            case 'jpeg':
            case 'jpg':
            case 'svg':

                break;
            default:
                this.value = '';
                isValid = false;
        }
        return isValid;
    }

    function VerifyFileNameAndFileSize() {
        var file = document.getElementById('GetFile').files[0];


        if (file != null) {
            var fileName = file.name;
            if (fileIsValid(fileName) == false) {
                validasi('Format bukan gambar!', 'warning');
                document.getElementById('GetFile').value = null;
                return false;
            }
            var content;
            var size = file.size;
            if ((size != null) && ((size / (1024 * 1024)) > 3)) {
                validasi('Ukuran maximum 1024px', 'warning');
                document.getElementById('GetFile').value = null;
                return false;
            }

            var ext = fileName.match(/\.([^\.]+)$/)[1];
            ext = ext.toLowerCase();
            // $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputImg').src = window.URL.createObjectURL(file);
            return true;

        } else
            return false;
    }
</script>