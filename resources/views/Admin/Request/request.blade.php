@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ $title }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Transaksi</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </div>
    </div>

    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">
                        @if (Session::get('user')->role_id == 5)
                            Data Request Saya
                        @else
                            Data Request Semua User
                        @endif
                    </h3>
                    @if ($hakTambah > 0)
                        <div>
                            <button class="btn btn-primary-light" onclick="checkAndAddRequest()">
                                Tambah Request <i class="fe fe-plus"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1" class="table table-bordered text-nowrap border-bottom dataTable no-footer">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Tanggal Request</th>
                                    <th>Request ID</th>
                                    <th>Departemen</th>
                                    <th>Status</th>
                                    <th width="1%">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add this at the top of your script section
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Function to add request
        function addRequest() {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menambah request baru?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, tambah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/request-barang/store',
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Request berhasil ditambahkan!',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.message,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            const response = xhr.responseJSON;
                            Swal.fire(
                                'Error!',
                                response?.message || 'Terjadi kesalahan saat menambah request!',
                                'error'
                            );
                        }
                    });
                }
            });
        }

        // Setup DataTable
        $(document).ready(function() {
            var table = $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/request-barang/getdata",
                // Update the columns section in the DataTable initialization
                // In request.blade.php, update the columns definition in DataTable initialization
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width: '5%' // Fixed narrow width
                    },
                    {
                        data: 'tanggal_format',
                        name: 'request_tanggal'
                    },
                    {
                        data: 'request_id',
                        name: 'request_id'
                    },
                    {
                        data: 'departemen',
                        name: 'departemen'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let buttons = '';

                            // Add Tambah Barang Masuk button if status is "draft" (make sure to use lowercase)
                            if (row.status.toLowerCase().includes('draft')) {
                                buttons += `<button onclick="addBarangMasuk('${row.request_id}')" class="btn btn-sm btn-success me-2">
                <i class="fe fe-plus"></i> Tambah Barang Masuk
            </button>`;
                            }

                            // Add Delete button if no barang masuk exists
                            if (!row.has_barang_masuk) {
                                buttons += `<button onclick="deleteRequest('${row.request_id}')" class="btn btn-sm btn-danger">
                <i class="fe fe-trash"></i> Delete
            </button>`;
                            }

                            return buttons || '-';
                        }
                    }
                ]
            });
        });

        // Function to handle request deletion
        function deleteRequest(requestId) {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menghapus request ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/request-barang/delete',
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            request_id: requestId
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Request berhasil dihapus.',
                                    'success'
                                ).then(() => {
                                    $('#table-1').DataTable().ajax.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.message,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            const response = xhr.responseJSON;
                            Swal.fire(
                                'Error!',
                                response?.message || 'Terjadi kesalahan saat menghapus data!',
                                'error'
                            );
                        }
                    });
                }
            });
        }

        // Function to check and add request
        function checkAndAddRequest() {
            $.ajax({
                url: '/admin/request-barang/check-status',
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        if (response.can_create_request) {
                            // Can create new request
                            addRequest();
                        } else {
                            // Show warning about pending/draft request
                            Swal.fire({
                                title: 'Tidak dapat membuat request baru',
                                text: 'Anda masih memiliki request dengan status ' + response
                                    .current_status,
                                icon: 'warning',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                },
                error: function() {
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan saat memeriksa status request',
                        'error'
                    );
                }
            });
        }

        // Function to check and add barang masuk
        function addBarangMasuk(requestId) {
            $.ajax({
                url: '/admin/request-barang/check-status',
                type: 'GET',
                data: {
                    request_id: requestId
                },
                success: function(response) {
                    if (response.success) {
                        if (response.can_add_barang) {
                            // Redirect to barang masuk page with request ID
                            window.location.href = `/admin/barang-masuk/create?request_id=${requestId}`;
                        } else {
                            Swal.fire({
                                title: 'Tidak dapat menambah barang',
                                text: 'Status request tidak valid untuk menambah barang',
                                icon: 'warning',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                },
                error: function() {
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan saat memeriksa status',
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
