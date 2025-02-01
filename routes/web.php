    <?php

    use App\Http\Controllers\Admin\BarangController;
    use App\Http\Controllers\Admin\BarangkeluarController;
    use App\Http\Controllers\Admin\BarangmasukController;
    use App\Http\Controllers\Admin\CustomerController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\JenisBarangController;
    use App\Http\Controllers\Admin\LapBarangKeluarController;
    use App\Http\Controllers\Admin\LapBarangMasukController;
    use App\Http\Controllers\Admin\LapPermintaanController;
    use App\Http\Controllers\Admin\LoginController;
    use App\Http\Controllers\Admin\MerkController;
    use App\Http\Controllers\Admin\SatuanController;
    use App\Http\Controllers\Master\AksesController;
    use App\Http\Controllers\Master\AppreanceController;
    use App\Http\Controllers\Master\MenuController;
    use App\Http\Controllers\Master\RoleController;
    use App\Http\Controllers\Master\UserController;
    use App\Http\Controllers\Admin\ApproveController;
    use App\Http\Controllers\Admin\RequestBarangController;
    use App\Http\Controllers\Admin\TrackingStatusController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    // login admin
    Route::middleware(['preventBackHistory'])->group(function () {
        Route::get('/admin/login', [LoginController::class, 'index'])->middleware('useractive');
        Route::post('/admin/proseslogin', [LoginController::class, 'proseslogin'])->middleware('useractive');
        Route::get('/admin/logout', [LoginController::class, 'logout']);
    });

    // admin
    Route::group(['middleware' => 'userlogin'], function () {

        // Profile
        Route::get('/admin/profile/{user}', [UserController::class, 'profile']);
        Route::post('/admin/updatePassword/{user}', [UserController::class, 'updatePassword']);
        Route::post('/admin/updateProfile/{user}', [UserController::class, 'updateProfile']);
        Route::get('/admin/appreance/', [AppreanceController::class, 'index']);
        Route::post('/admin/appreance/{setting}', [AppreanceController::class, 'update']);

        Route::middleware(['checkRoleUser:/dashboard,menu'])->group(function () {
            Route::get('/', [DashboardController::class, 'index']);
            Route::get('/admin', [DashboardController::class, 'index']);
            Route::get('/admin/dashboard', [DashboardController::class, 'index']);
            Route::get('/admin/division-bookings', [DashboardController::class, 'getDivisionBookings']);
            Route::get('/admin/top-five-barang', [DashboardController::class, 'getTopFiveBarang']);
        });

        Route::middleware(['checkRoleUser:/jenisbarang,submenu'])->group(function () {
            // Route yang sudah ada
            Route::get('/admin/jenisbarang', [JenisBarangController::class, 'index']);
            Route::get('/admin/jenisbarang/show/', [JenisBarangController::class, 'show'])->name('jenisbarang.getjenisbarang');
            Route::post('/admin/jenisbarang/proses_tambah/', [JenisBarangController::class, 'proses_tambah'])->name('jenisbarang.store');
            Route::post('/admin/jenisbarang/proses_ubah/{jenisbarang}', [JenisBarangController::class, 'proses_ubah']);
            Route::post('/admin/jenisbarang/proses_hapus/{jenisbarang}', [JenisBarangController::class, 'proses_hapus']);

            //view buat dashboard
            Route::get('/admin/jenisbarang-view', [JenisBarangController::class, 'viewList'])->name('jenisbarang.view');
        });
        // Tambahkan route untuk getData
        Route::get('/admin/jenisbarang/get-data', [JenisBarangController::class, 'getData'])->name('jenisbarang.get');

        Route::middleware(['checkRoleUser:/satuan,submenu'])->group(function () {
            // Satuan
            Route::resource('/admin/satuan', \App\Http\Controllers\Admin\SatuanController::class);
            Route::get('/admin/satuan/show/', [SatuanController::class, 'show'])->name('satuan.getsatuan');
            Route::post('/admin/satuan/proses_tambah/', [SatuanController::class, 'proses_tambah'])->name('satuan.store');
            Route::post('/admin/satuan/proses_ubah/{satuan}', [SatuanController::class, 'proses_ubah']);
            Route::post('/admin/satuan/proses_hapus/{satuan}', [SatuanController::class, 'proses_hapus']);

            //view untuk dashboard
            Route::get('/admin/satuan-view', [SatuanController::class, 'viewList'])->name('satuan.view');
        });

        Route::middleware(['checkRoleUser:/merk,submenu'])->group(function () {
            // Merk
            Route::resource('/admin/merk', \App\Http\Controllers\Admin\MerkController::class);
            Route::get('/admin/merk/show/', [MerkController::class, 'show'])->name('merk.getmerk');
            Route::post('/admin/merk/proses_tambah/', [MerkController::class, 'proses_tambah'])->name('merk.store');
            Route::post('/admin/merk/proses_ubah/{merk}', [MerkController::class, 'proses_ubah']);
            Route::post('/admin/merk/proses_hapus/{merk}', [MerkController::class, 'proses_hapus']);
            Route::get('/admin/merk/get-by-jenis/{jenisbarang_id}', [MerkController::class, 'getByJenis'])->name('merk.getByJenis');

            //view untuk dashboard
            Route::get('/admin/merk-view', [MerkController::class, 'viewList'])->name('merk.view');
        });

        Route::middleware(['checkRoleUser:/barang,submenu'])->group(function () {
            // Barang
            Route::resource('/admin/barang', \App\Http\Controllers\Admin\BarangController::class);
            Route::get('/admin/barang/show', [BarangController::class, 'show'])->name('barang.show');
            Route::get('/admin/barang/check-kode/{kode}', [BarangController::class, 'getbarang'])->name('barang.check-kode');
            Route::post('/admin/barang/proses_tambah', [BarangController::class, 'proses_tambah'])->name('barang.store');
            Route::post('/admin/barang/proses_ubah/{barang}', [BarangController::class, 'proses_ubah']);
            Route::post('/admin/barang/proses_hapus/{barang}', [BarangController::class, 'proses_hapus']);

            //liat lists barang untuk dashboard
            Route::get('/admin/barang-view', [BarangController::class, 'viewList'])->name('barang.view');
        });

        Route::middleware(['checkRoleUser:/customer,menu'])->group(function () {
            // Customer
            Route::resource('/admin/customer', \App\Http\Controllers\Admin\CustomerController::class);
            Route::get('/admin/customer/show/', [CustomerController::class, 'show'])->name('customer.getcustomer');
            Route::post('/admin/customer/proses_tambah/', [CustomerController::class, 'proses_tambah'])->name('customer.store');
            Route::post('/admin/customer/proses_ubah/{customer}', [CustomerController::class, 'proses_ubah']);
            Route::post('/admin/customer/proses_hapus/{customer}', [CustomerController::class, 'proses_hapus']);
        });

        Route::middleware(['checkRoleUser:/barang-masuk,submenu'])->group(function () {
            // Barang Masuk
            Route::resource('/admin/barang-masuk', \App\Http\Controllers\Admin\BarangmasukController::class);
            Route::get('/admin/barang-masuk/show/', [BarangmasukController::class, 'show'])->name('barang-masuk.getbarang-masuk');
            Route::post('/admin/barang-masuk/proses_tambah/', [BarangmasukController::class, 'proses_tambah'])->name('barang-masuk.store');
            Route::post('/admin/barang-masuk/proses_ubah/{barangmasuk}', [BarangmasukController::class, 'proses_ubah']);
            Route::post('/admin/barang-masuk/proses_hapus/{barangmasuk}', [BarangmasukController::class, 'proses_hapus']);
            Route::get('/admin/barang/getbarang/{id}', [BarangController::class, 'getbarang']);
            Route::get('/admin/barang/listbarang/{param}', [BarangController::class, 'listbarang']);
        });

        Route::middleware(['checkRoleUser:/barang-keluar,submenu'])->group(function () {
            // Barang Keluar
            Route::resource('/admin/barang-keluar', \App\Http\Controllers\Admin\BarangkeluarController::class);
            Route::get('/admin/barang-keluar/show/', [BarangkeluarController::class, 'show'])->name('barang-keluar.getbarang-keluar');
            Route::post('/admin/barang-keluar/proses_tambah/', [BarangkeluarController::class, 'proses_tambah'])->name('barang-keluar.store');
            Route::post('/admin/barang-keluar/proses_ubah/{barangkeluar}', [BarangkeluarController::class, 'proses_ubah']);
            Route::post('/admin/barang-keluar/proses_hapus/{barangkeluar}', [BarangkeluarController::class, 'proses_hapus']);
        });

        Route::middleware(['checkRoleUser:/lap-barang-masuk,submenu'])->group(function () {
            // Laporan Barang Masuk
            Route::resource('/admin/lap-barang-masuk', \App\Http\Controllers\Admin\LapBarangMasukController::class);
            Route::get('/admin/lapbarangmasuk/print/', [LapBarangMasukController::class, 'print'])->name('lap-bm.print');
            Route::get('/admin/lapbarangmasuk/pdf/', [LapBarangMasukController::class, 'pdf'])->name('lap-bm.pdf');
            Route::get('/admin/lapbarangmasuk/csv/', [LapBarangMasukController::class, 'csv'])->name('lap-bm.csv');
            Route::get('/admin/lap-bm/getlap-bm', [LapBarangMasukController::class, 'show'])->name('lap-bm.getlap-bm');
        });

        Route::middleware(['checkRoleUser:/lap-barang-keluar,submenu'])->group(function () {
            // Laporan Barang Keluar
            Route::resource('/admin/lap-barang-keluar', \App\Http\Controllers\Admin\LapBarangKeluarController::class);
            Route::get('/admin/lapbarangkeluar/print/', [LapBarangKeluarController::class, 'print'])->name('lap-bk.print');
            Route::get('/admin/lapbarangkeluar/pdf/', [LapBarangKeluarController::class, 'pdf'])->name('lap-bk.pdf');
            Route::get('/admin/lap-barang-keluar/show/', [LapBarangKeluarController::class, 'show'])->name('lap-bk.getlap-bk');
        });

        Route::middleware(['checkRoleUser:/lap-permintaan,submenu'])->group(function () {
            Route::resource('/admin/lap-permintaan', \App\Http\Controllers\Admin\LapPermintaanController::class);
            Route::get('/admin/lappermintaan/print/', [LapPermintaanController::class, 'print'])->name('lap-permintaan.print');
            Route::get('/admin/lappermintaan/pdf/', [LapPermintaanController::class, 'pdf'])->name('lap-permintaan.pdf');
            Route::get('/admin/lap-permintaan/show/', [LapPermintaanController::class, 'show'])->name('lap-permintaan.getlap-permintaan');
            Route::get('/admin/lappermintaan/csv/', [LapPermintaanController::class, 'csv'])->name('lap-permintaan.csv');
        });

        Route::middleware(['checkRoleUser:/request-barang,menu'])->group(function () {
            Route::prefix('admin/request-barang')->group(function () {
                Route::get('/', [RequestBarangController::class, 'index']);
                Route::get('/getdata', [RequestBarangController::class, 'getdata'])->name('request-barang.getdata');
                Route::get('/show', [RequestBarangController::class, 'show'])->name('request-barang.show');
                Route::post('/store', [RequestBarangController::class, 'store'])->name('request-barang.store');
                Route::get('/detail/{id}', [RequestBarangController::class, 'detail'])->name('request-barang.detail');
                Route::delete('/delete', [RequestBarangController::class, 'delete'])->name('request-barang.delete');
                Route::get('/getbarang', [RequestBarangController::class, 'getBarang'])->name('request-barang.getbarang');
                Route::get('/check-status', [RequestBarangController::class, 'checkRequestStatus'])->name('request-barang.check-status');
                Route::get('/get-details/{id}', [RequestBarangController::class, 'getDetails'])->name('request-barang.get-details');
                Route::post('/update-status/{id}', [RequestBarangController::class, 'updateStatus'])->name('request-barang.updateStatus');
                Route::post('/complete/{id}', [RequestBarangController::class, 'completeRequest']);
                Route::post('/store-signature', [RequestBarangController::class, 'storeSignature'])->name('request-barang.store-signature');
                Route::get('/get-details/{id}', [RequestBarangController::class, 'getDetails'])
                    ->name('request-barang.get-details');
            });
        });

        //Approval Sidebar
        Route::middleware(['checkRoleUser:/approval,menu'])->group(function () {
            Route::prefix('admin/approval')->group(function () {
                Route::get('/', [ApproveController::class, 'index']);
                Route::get('/show', [ApproveController::class, 'show'])->name('approve.show');
                // Update this route to handle slashes
                Route::get('/detail/{request_id}', [ApproveController::class, 'getDetail'])
                    ->where('request_id', '.*')  // This allows any character including slashes
                    ->name('approve.detail');
                Route::post('/bulk-update', [ApproveController::class, 'bulkUpdate'])->name('approve.bulk-update');
                Route::post('/set-status/{bm_id}/{status}', [ApproveController::class, 'setItemStatus']);
                Route::post('/store-signature', [ApproveController::class, 'storeSignature'])->name('approve.store-signature');
                // Update this route as well
                Route::get('/view-signature/{request_id}', [ApproveController::class, 'viewSignature'])
                    ->where('request_id', '.*')
                    ->name('approve.view-signature');
            });
        });

        //Tracking Sidebar
        Route::middleware(['checkRoleUser:/tracking,menu'])->group(function () {
            Route::prefix('admin/tracking')->group(function () {
                // Route yang sudah ada
                Route::get('/', [TrackingStatusController::class, 'index']);
                Route::get('/show', [TrackingStatusController::class, 'show'])->name('tracking.show');
                Route::get('/detail/{request_id}', [TrackingStatusController::class, 'getDetail'])
                    ->where('request_id', '.*')
                    ->name('tracking.detail');
                Route::post('/bulk-update', [TrackingStatusController::class, 'bulkUpdate'])->name('tracking.bulk-update');

                // Route baru yang perlu ditambahkan untuk handling status tracking
                Route::post('/update-status', [TrackingStatusController::class, 'updateStatus'])->name('tracking.update-status');
                Route::get('/get-status/{request_id}', [TrackingStatusController::class, 'getStatus'])->name('tracking.get-status');
            });
        });

        Route::middleware(['checkRoleUser:1,othermenu'])->group(function () {

            Route::middleware(['checkRoleUser:2,othermenu'])->group(function () {
                // Menu
                Route::resource('/admin/menu', \App\Http\Controllers\Master\MenuController::class);
                Route::post('/admin/menu/hapus', [MenuController::class, 'hapus']);
                Route::get('/admin/menu/sortup/{sort}', [MenuController::class, 'sortup']);
                Route::get('/admin/menu/sortdown/{sort}', [MenuController::class, 'sortdown']);
            });

            Route::middleware(['checkRoleUser:3,othermenu'])->group(function () {
                // Role
                Route::resource('/admin/role', \App\Http\Controllers\Master\RoleController::class);
                Route::get('/admin/role/show/', [RoleController::class, 'show'])->name('role.getrole');
                Route::post('/admin/role/hapus', [RoleController::class, 'hapus']);
            });

            Route::middleware(['checkRoleUser:4,othermenu'])->group(function () {
                // List User
                Route::resource('/admin/user', \App\Http\Controllers\Master\UserController::class);
                Route::get('/admin/user/show/', [UserController::class, 'show'])->name('user.getuser');
                Route::post('/admin/user/hapus', [UserController::class, 'hapus']);
            });

            Route::middleware(['checkRoleUser:5,othermenu'])->group(function () {
                // Akses
                Route::get('/admin/akses/{role}', [AksesController::class, 'index']);
                Route::get('/admin/akses/addAkses/{idmenu}/{idrole}/{type}/{akses}', [AksesController::class, 'addAkses']);
                Route::get('/admin/akses/removeAkses/{idmenu}/{idrole}/{type}/{akses}', [AksesController::class, 'removeAkses']);
                Route::get('/admin/akses/setAll/{role}', [AksesController::class, 'setAllAkses']);
                Route::get('/admin/akses/unsetAll/{role}', [AksesController::class, 'unsetAllAkses']);
            });

            Route::middleware(['checkRoleUser:6,othermenu'])->group(function () {
                // Web
                Route::resource('/admin/web', \App\Http\Controllers\Master\WebController::class);
            });
        });
    });
