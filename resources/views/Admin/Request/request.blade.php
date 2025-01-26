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
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary-gradient text-white">
                    <h5 class="modal-title fw-bold">Detail Request Barang</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid p-0">
                        <div class="row g-4">
                            <!-- Informasi Request -->
                            <div class="col-md-6">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body">
                                        <h6 class="fw-bold mb-4 text-primary">Informasi Request</h6>
                                        <div class="d-flex flex-column gap-3">
                                            <div>
                                                <label class="text-muted small mb-1">Request ID</label>
                                                <div id="detail-requestid" class="fs-6 fw-semibold"></div>
                                            </div>
                                            <div>
                                                <label class="text-muted small mb-1">Tanggal Request</label>
                                                <div id="detail-tanggal" class="fs-6 fw-semibold"></div>
                                            </div>
                                            <div>
                                                <label class="text-muted small mb-1">Departemen</label>
                                                <div id="detail-departemen" class="fs-6 fw-semibold"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Request -->
                            <div class="col-md-6">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body">
                                        <h6 class="fw-bold mb-4 text-primary">Status Request</h6>
                                        <div class="d-flex flex-column gap-3">
                                            <div>
                                                <label class="text-muted small mb-1">Status Request</label>
                                                <div id="detail-status" class="fs-6 mt-1"></div>
                                            </div>
                                            <div>
                                                <label class="text-muted small mb-1">Jumlah Item</label>
                                                <div id="detail-jumlahitem" class="fs-6 fw-semibold"></div>
                                            </div>
                                            <div>
                                                <label class="text-muted small mb-1">Total Harga</label>
                                                <div id="detail-totalharga" class="fs-6 fw-semibold text-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Daftar Barang -->
                            <div class="col-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h6 class="fw-bold mb-3 text-primary">Daftar Barang</h6>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th class="text-center" width="5%">No</th>
                                                        <th>Barang</th>
                                                        <th class="text-center" width="10%">Jumlah</th>
                                                        <th class="text-end" width="15%">Harga Satuan</th>
                                                        <th class="text-end" width="15%">Total</th>
                                                        <th class="text-center" width="10%">Status</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="detail-items">
                                                    <!-- Items will be inserted here dynamically -->
                                                </tbody>
                                                <tfoot class="bg-light">
                                                    <tr>
                                                        <td colspan="6" class="text-end fw-bold">Harga Keseluruhan</td>
                                                        <td colspan="1" class="fw-bold text-success text-end"
                                                            id="detail-total"></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

        function showDetail(data) {
                $('#detail-requestid').text('-');
                $('#detail-tanggal').text('-');
                $('#detail-departemen').text('-');
                $('#detail-status').html('-');
                $('#detail-items').html('<tr><td colspan="7" class="text-center">Memuat data...</td></tr>');
                $('#detail-jumlahitem').text('-');
                $('#detail-totalharga').text('-');

                $('#detail-requestid').text(data.request_id);
                $('#detail-tanggal').text(data.tanggal_format);
                $('#detail-departemen').text(data.departemen);
                $('#detail-status').html(getStatusBadge(data.status));

                $.ajax({
                    url: '/admin/request-barang/get-details/' + data.request_id,
                    method: 'GET',
                    success: function (response) {
                        if (response.success) {
                            $('#detail-jumlahitem').text(response.total_items + ' Item');
                            $('#detail-totalharga').text('Rp ' + response.total_harga.toLocaleString('id-ID'));

                             let itemsHtml = '';
                            if (response.items && response.items.length > 0) {
                                response.items.forEach((item, index) => {
                                    let totalHarga = item.bm_jumlah * item.harga;
                                    let keterangan = item.keterangan || '-';
                            if (keterangan.includes('Rejected by')) {
                                        let parts = keterangan.split(/(Rejected by.*)/);
                                        keterangan = parts[0] + '<span class="text-danger">' + parts[1] + '</span>';
                                    }
                                    itemsHtml += `
                                    <tr>
                                        <td class="text-center">${index + 1}</td>
                                        <td>${item.barang_nama || '-'}</td>
                                        <td class="text-center">${item.bm_jumlah}</td>
                                        <td class="text-end">Rp ${parseFloat(item.harga).toLocaleString('id-ID')}</td>
                                        <td class="text-end">Rp ${parseFloat(totalHarga).toLocaleString('id-ID')}</td>
                                        <td class="text-center">${getStatusBadge(item.tracking_status)}</td>
                                        <td>${keterangan}</td>
                                    </tr>
                                `;
                                });
                            } else {
                                itemsHtml = '<tr><td colspan="7" class="text-center">Tidak ada data barang</td></tr>';
                            }
                            $('#detail-items').html(itemsHtml);
                            $('#detail-total').text('Rp ' + response.total_harga.toLocaleString('id-ID'));
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        $('#detail-items').html('<tr><td colspan="7" class="text-center">Gagal memuat data</td></tr>');
                        $('#detail-jumlahitem').text('-');
                        $('#detail-totalharga').text('-');
                    }
                });

                $('#detailModal').modal('show');
            }

        function getStatusBadge(status) {
                status = (status || '').toLowerCase();
                let badgeClass, icon;

                switch (status) {
                    case 'diterima':
                        badgeClass = 'bg-success';
                        icon = 'check-circle';
                        break;
                    case 'diproses':
                        badgeClass = 'bg-primary';
                        icon = 'loader';
                        break;
                    case 'ditolak':
                        badgeClass = 'bg-danger';
                        icon = 'x-circle';
                        break;
                    default:
                        badgeClass = 'bg-info';
                        icon = 'clock';
                        status = 'PENDING';
                }

                return `<span class="badge ${badgeClass}-gradient">
        <i class="fe fe-${icon} me-1"></i>${status.toUpperCase()}
    </span>`;
            }

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

        $(document).ready(function() {
            var table = $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/request-barang/getdata",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width: '5%'
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
                    }
                ],
                createdRow: function(row, data) {
                    $(row).css('cursor', 'pointer');
                    $(row).find('td:not(:last-child)').on('click', function() {
                        showDetail(data);
                    });
                }
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
