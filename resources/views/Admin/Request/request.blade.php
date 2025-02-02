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
                    <!-- Filter Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="" class="fw-bold">Filter Data</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="tglawal" class="form-control datepicker-date"
                                    placeholder="Tanggal Awal">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="tglakhir" class="form-control datepicker-date"
                                    placeholder="Tanggal Akhir">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="draft">Draft</option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="Diproses">Diproses</option>
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Diterima">Diterima</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success-light" onclick="filter()"><i class="fe fe-filter"></i>
                                Filter</button>
                            <button class="btn btn-secondary-light" onclick="reset()"><i class="fe fe-refresh-ccw"></i>
                                Reset</button>
                        </div>
                    </div>
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
    <div class="modal fade" id="detailModal" tabindex="-1">
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
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Request ID</label>
                                            <div id="detail-requestid" class="fs-6 fw-semibold">-</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Tanggal Request</label>
                                            <div id="detail-tanggal" class="fs-6 fw-semibold">-</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Departemen</label>
                                            <div id="detail-departemen" class="fs-6 fw-semibold">-</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Divisi</label>
                                            <div id="detail-divisi" class="fs-6 fw-semibold">-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Request -->
                            <div class="col-md-6">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body">
                                        <h6 class="fw-bold mb-4 text-primary">Status Request</h6>
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Status</label>
                                            <div id="detail-status" class="fs-6 mt-1">-</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Jumlah Barang</label>
                                            <div id="detail-jumlahitem" class="fs-6 fw-semibold">-</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted small mb-1">Total Harga</label>
                                            <div id="detail-totalharga" class="fs-6 fw-semibold text-success">-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tabel Barang -->
                            <div class="col-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h6 class="fw-bold mb-3 text-primary">Daftar Barang</h6>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th class="text-center" width="5%">No</th>
                                                        <th>Nama Barang</th>
                                                        <th class="text-center" width="10%">Jumlah</th>
                                                        <th class="text-end" width="15%">Harga Satuan</th>
                                                        <th class="text-end" width="15%">Total</th>
                                                        <th class="text-center" width="10%">Status</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="detail-items">
                                                    <tr>
                                                        <td colspan="7" class="text-center">Memuat data...</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="bg-light">
                                                    <tr>
                                                        <td colspan="4" class="text-end fw-bold">Total Keseluruhan</td>
                                                        <td colspan="3" class="fw-bold text-success text-end"
                                                            id="detail-total">-</td>
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
            // Reset modal content
            $('#detail-requestid').text('-');
            $('#detail-tanggal').text('-');
            $('#detail-departemen').text('-');
            $('#detail-divisi').text('-');
            $('#detail-status').html('-');
            $('#detail-items').html('<tr><td colspan="7" class="text-center">Memuat data...</td></tr>');
            $('#detail-jumlahitem').text('-');
            $('#detail-totalharga').text('-');

            // Show modal
            $('#detailModal').modal('show');

            // Encode request_id dengan base64
            const encodedId = btoa(data.request_id);

            // Fetch details
            $.ajax({
                url: `/admin/request-barang/get-details/${encodedId}`,
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        // Update informasi request
                        $('#detail-requestid').text(response.request.request_id);
                        $('#detail-tanggal').text(response.request.request_tanggal);
                        $('#detail-departemen').text(response.request.departemen);
                        $('#detail-divisi').text(response.request.divisi);
                        $('#detail-status').html(getStatusBadge(response.request.status));

                        // Update summary
                        $('#detail-jumlahitem').text(`${response.total_items} Item`);
                        $('#detail-totalharga').text(`Rp ${response.total_harga.toLocaleString('id-ID')}`);

                        // Generate items table
                        let itemsHtml = '';
                        if (response.items && response.items.length > 0) {
                            response.items.forEach((item, index) => {
                                itemsHtml += `
    <tr>
        <td class="text-center">${index + 1}</td>
        <td>${item.barang_nama || '-'}</td>
        <td class="text-center">${item.bm_jumlah} ${item.satuan || ''}</td>
        <td class="text-end">Rp ${parseFloat(item.harga).toLocaleString('id-ID')}</td>
        <td class="text-end">Rp ${item.total_harga.toLocaleString('id-ID')}</td>
        <td class="text-center">${getStatusBadge(item.tracking_status)}</td>
        <td>${item.keterangan || '-'}
            ${item.tracking_status && item.tracking_status.toLowerCase() === 'dikirim' ?
                `<i class="fe fe-check-circle text-success float-end" 
                        style="cursor: pointer" 
                        onclick="updateItemStatus('${item.bm_id}', 'diterima')" 
                        title="Klik untuk konfirmasi penerimaan">
                    </i>` : ''
            }
        </td>
    </tr>`;
                            });
                        } else {
                            itemsHtml =
                                '<tr><td colspan="7" class="text-center">Tidak ada data barang</td></tr>';
                        }
                        $('#detail-items').html(itemsHtml);
                        $('#detail-total').text(`Rp ${response.total_harga.toLocaleString('id-ID')}`);
                    }
                },
                error: function(xhr) {
                    const response = xhr.responseJSON;
                    $('#detail-items').html(`
                <tr>
                    <td colspan="7" class="text-center text-danger">
                        <i class="fe fe-alert-circle me-2"></i>
                        ${response?.message || 'Gagal memuat data'}
                    </td>
                </tr>`);
                }
            });
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
                    status = 'DITOLAK';
                    break;
                case 'reject':
                    badgeClass = 'bg-danger';
                    icon = 'x-circle';
                    status = 'Reject';
                    break;
                case 'dikirim':
                    badgeClass = 'bg-info';
                    icon = 'send';
                    break;
                case 'draft':
                    badgeClass = 'bg-warning';
                    icon = 'edit-3';
                    status = 'DRAFT';
                    break;
                case 'approve':
                    badgeClass = 'bg-success';
                    icon = 'check';
                    status = 'DISETUJUI';
                    break;
                case 'pending':
                    badgeClass = 'bg-info';
                    icon = 'clock';
                    status = 'PENDING';
                    break;
                default:
                    badgeClass = 'bg-secondary';
                    icon = 'help-circle';
                    status = 'Send To GM';
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
            $('#detailModal').on('hidden.bs.modal', function() {
                if (window.statusChanged === true) {
                    // Refresh datatable tanpa reload halaman
                    $('#table-1').DataTable().ajax.reload(null, false);
                    window.statusChanged = false;
                }
            });
            $('.datepicker-date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
            var table = $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/request-barang/getdata",
                    data: function(d) {
                        d.tglawal = $('input[name="tglawal"]').val();
                        d.tglakhir = $('input[name="tglakhir"]').val();
                        d.status = $('select[name="status"]').val();
                    }
                },
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
        // Filter function
        function filter() {
            var tglawal = $('input[name="tglawal"]').val();
            var tglakhir = $('input[name="tglakhir"]').val();
            var status = $('select[name="status"]').val();

            // Check if at least one filter is set
            if (tglawal || tglakhir || status) {
                // Validate date range if either date is set
                if ((tglawal && !tglakhir) || (!tglawal && tglakhir)) {
                    Swal.fire({
                        title: 'Peringatan',
                        text: 'Jika ingin filter tanggal, harap isi kedua tanggal!',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    });
                    return;
                }
                $('#table-1').DataTable().ajax.reload();
            } else {
                Swal.fire({
                    title: 'Peringatan',
                    text: 'Harap isi minimal satu filter!',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                });
            }
        }

        // Reset function
        function reset() {
            $('input[name="tglawal"]').val('');
            $('input[name="tglakhir"]').val('');
            $('select[name="status"]').val('');
            $('#table-1').DataTable().ajax.reload();
        }
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
        window.statusChanged = false;

        function updateItemStatus(barangmasukId, newStatus) {
            // Tambahkan style untuk memastikan SweetAlert muncul di atas modal Bootstrap
            if (!document.getElementById('swal-styles')) {
                const style = document.createElement('style');
                style.id = 'swal-styles';
                style.innerHTML = `
            .swal2-container {
                z-index: 9999 !important; 
            }
            .swal2-popup {
                z-index: 10000 !important;
            }
            .modal-backdrop {
                z-index: 1050 !important;
            }
            .modal {
                z-index: 1051 !important;
            }
        `;
                document.head.appendChild(style);
            }

            Swal.fire({
                title: 'Konfirmasi Penerimaan',
                text: "Apakah Anda yakin telah menerima barang ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Terima!',
                cancelButtonText: 'Batal',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/request-barang/update-status/' + barangmasukId,
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            status: newStatus
                        },
                        success: function(response) {
                            if (response.success) {
                                window.statusChanged = true;
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Status barang berhasil diperbarui!',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    // Refresh detail modal content
                                    let currentRequestId = $('#detail-requestid').text();
                                    showDetail({
                                        request_id: currentRequestId,
                                        tanggal_format: $('#detail-tanggal').text(),
                                        departemen: $('#detail-departemen').text(),
                                        status: $('#detail-status').text()
                                    });
                                });
                            } else {
                                Swal.fire('Error!', response.message, 'error');
                            }
                        },
                        error: function(xhr) {
                            const response = xhr.responseJSON;
                            Swal.fire(
                                'Error!',
                                response?.message || 'Terjadi kesalahan saat mengupdate status!',
                                'error'
                            );
                        }
                    });
                }
            });
        }

        // Add this to your existing JavaScript
        function selesaiRequest(requestId) {
            $('#current_request_id').val(requestId);
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menyelesaikan request ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, selesaikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    showSignatureModal(requestId);
                }
            });
        }
        // Initialize signature pad when modal is shown
        let signaturePad;
        // Add hidden input to store request_id
        $(document).ready(function() {
            // Add modal
            $('body').append(`
                        <div class="modal fade" id="signatureModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tanda Tangan Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="current_request_id">
                                        <canvas id="signaturePad" class="border rounded w-100" width="400" height="200"></canvas>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" onclick="clearSignature()">
                                            <i class="fe fe-refresh-cw"></i> Clear
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="saveSignature()">
                                            <i class="fe fe-check"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);

            // Initialize signature pad when modal is shown
            $('#signatureModal').on('shown.bs.modal', function() {
                const canvas = document.getElementById('signaturePad');
                signaturePad = new SignaturePad(canvas, {
                    backgroundColor: 'rgb(255, 255, 255)'
                });
            });
        });

        function showSignatureModal() {
            $('#signatureModal').modal('show');
        }

        function clearSignature() {
            if (signaturePad) {
                signaturePad.clear();
            }
        }

        // Perbaiki fungsi completeRequest untuk encode request ID
        function completeRequest(requestId) {
            // Encode request ID dengan base64
            const encodedId = btoa(requestId);

            $.ajax({
                url: `/admin/request-barang/complete/${encodedId}`,
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Request berhasil diselesaikan!',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            $('#table-1').DataTable().ajax.reload();
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            response.message || 'Terjadi kesalahan saat menyelesaikan request!',
                            'error'
                        );
                    }
                },
                error: function(xhr) {
                    const response = xhr.responseJSON;
                    Swal.fire(
                        'Error!',
                        response?.message || 'Terjadi kesalahan saat menyelesaikan request!',
                        'error'
                    );
                }
            });
        }

        // Update fungsi saveSignature untuk menangani request ID dengan benar
        function saveSignature() {
            if (!signaturePad || signaturePad.isEmpty()) {
                Swal.fire('Error!', 'Harap memberikan tanda tangan', 'error');
                return;
            }

            const requestId = $('#current_request_id').val();
            if (!requestId) {
                Swal.fire('Error!', 'Request ID tidak ditemukan', 'error');
                return;
            }

            const signatureData = signaturePad.toDataURL();

            $.ajax({
                url: "/admin/request-barang/store-signature",
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    request_id: requestId,
                    signature: signatureData
                },
                success: function(response) {
                    if (response.success) {
                        $('#signatureModal').modal('hide');
                        completeRequest(requestId);
                    } else {
                        Swal.fire('Error!', response.message || 'Gagal menyimpan tanda tangan', 'error');
                    }
                },
                error: function(xhr) {
                    Swal.fire('Error!', xhr.responseJSON?.message || 'Gagal menyimpan tanda tangan', 'error');
                }
            });
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        #signaturePad {
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
        }
    </style>
@endsection
