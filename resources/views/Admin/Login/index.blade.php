@extends('Master.Layouts.app_login', ['title' => $title])

@section('content')
<style>
    .container-login100 {
        position: relative;
        min-height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container-login100::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("{{ url('/assets/images/bg-gedung.png') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(8px);
        -webkit-filter: blur(8px);
        z-index: -1;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .wrap-login100 {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        width: 400px;
        padding: 2rem;
        position: relative;
        z-index: 1;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    .login100-form-btn {
        background: #0066cc !important;
        color: white !important;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .login100-form-btn:hover {
        background: #ffd700 !important;
        color: #0066cc !important;
    }

    .input-group-text {
        border: 1px solid #ced4da;
    }
    
    .input-group-text i {
        color: #0066cc !important;
    }

    .zmdi-account, .zmdi-eye, .zmdi-eye-off {
        color: #0066cc !important;
    }

    .input100 {
        border: 1px solid #ced4da !important;
    }

    .text-black {
        color: #0066cc !important;
    }

    .text-gray {
        color: #ffd700 !important;
    }

    /* Tambahan styling untuk input */
    .wrap-input100 {
        margin-bottom: 1rem;
    }

    .validate-input {
        position: relative;
    }
</style>

<div class="container-login100">
    <div class="wrap-login100">
        <div class="d-flex justify-content-center align-items-center">
            <!-- Gunakan URL yang benar untuk logo -->
            <img src="{{ asset('assets/images/logoug.png') }}" height="75px" class="rounded-circle" alt="logo">
        </div>
        <div class="text-center">
            <h4 class="fw-bold mt-4 text-black text-uppercase">UG PROCUREMENT <span class="text-gray">| LOGIN</span></h4>
        </div>
        <form class="login100-form validate-form" method="POST" name="myForm" action="{{ url('admin/proseslogin') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <div class="panel panel-primary">
                <div class="panel-body tabs-menu-body p-0 pt-5">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab5">
                            <div class="wrap-input100 validate-input input-group">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white">
                                    <i class="zmdi zmdi-account" aria-hidden="true"></i>
                                </a>
                                <input name="user" value="{{Session::get('userInput')}}" class="input100 border-start-0 form-control ms-0" type="text" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="wrap-input100 validate-input input-group">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white" id="togglePassword">
                                    <i class="zmdi zmdi-eye" id="toggleIcon" aria-hidden="true"></i>
                                </a>
                                <input name="pwd" id="passwordInput" class="input100 border-start-0 form-control ms-0" type="password" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="container-login100-form-btn mt-4">
                                <button type="button" class="login100-form-btn btn d-none" id="btnLoader" disabled>
                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="login100-form-btn btn" id="btnLogin">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function validateForm() {
        var usr = document.forms["myForm"]["user"].value;
        var pwd = document.forms["myForm"]["pwd"].value;

        setLoading(true);

        if (usr == "") {
            validasi('Username masih kosong!', 'warning');
            setLoading(false);
            return false;
        } else if (pwd == '') {
            validasi('Password masih kosong!', 'warning');
            setLoading(false);
            return false;
        }
    }

    function setLoading(bool) {
        if(bool == true) {
            $('#btnLoader').removeClass('d-none');
            $('#btnLogin').addClass('d-none');
        } else {
            $('#btnLogin').removeClass('d-none');
            $('#btnLoader').addClass('d-none');
        }
    }

    function validasi(judul, status) {
        swal({
            title: judul,
            type: status,
            confirmButtonText: "OK"
        });
    }

    // Toggle Password Visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('passwordInput');
        const toggleIcon = document.getElementById('toggleIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('zmdi-eye');
            toggleIcon.classList.add('zmdi-eye-off');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('zmdi-eye-off');
            toggleIcon.classList.add('zmdi-eye');
        }
    });
</script>
@endsection