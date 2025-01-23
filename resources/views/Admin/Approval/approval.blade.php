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
                    <h3 class="card-title">Data Approval Request</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Tanggal Request</th>
                                    <th>Request ID</th>
                                    <th>Divisi</th>
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
    <div class="modal fade" id="modalDetail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Request Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="current_request_id">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Divisi</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Signature</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="detail-content"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-red" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="simpanApproval()">Simpan Approval</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Signature Modal -->
    <div class="modal fade" id="signatureModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Draw Signature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <canvas id="signaturePad" class="border rounded" width="400" height="200"></canvas>
                    <input type="hidden" id="currentBmId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="clearSignature()">Clear</button>
                    <button type="button" class="btn btn-primary" onclick="saveSignature()">Save Signature</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/4.1.5/signature_pad.umd.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Add signature pad library
        document.head.appendChild(Object.assign(document.createElement('script'), {
            src: 'https://cdnjs.cloudflare.com/ajax/libs/signature_pad/4.1.5/signature_pad.umd.min.js'
        }));

        let signaturePad;

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize signature pad when the modal is shown
            $('#signatureModal').on('shown.bs.modal', function() {
                const canvas = document.getElementById('signaturePad');
                signaturePad = new SignaturePad(canvas, {
                    backgroundColor: 'rgb(255, 255, 255)'
                });
            });
        });

        function initializeSignaturePad() {
            const canvas = document.getElementById('signaturePad');
            signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
            });
        }

        function clearSignature() {
            if (signaturePad) {
                signaturePad.clear();
            }
        }

        function showSignatureModal(bm_id) {
            $('#currentBmId').val(bm_id);
            $('#signatureModal').modal('show');
        }


        function saveSignature() {
            if (!signaturePad || signaturePad.isEmpty()) {
                swal("Error!", "Please provide signature", "error");
                return;
            }

            const bm_id = $('#currentBmId').val();
            const request_id = $('#current_request_id').val(); // Add this
            const signatureData = signaturePad.toDataURL();

            $.ajax({
                url: "/admin/approval/store-signature",
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    request_id: request_id,
                    signature: signatureData
                },
                success: function(response) {
                    if (response.success) {
                        $('#signatureModal').modal('hide');
                        swal("Success!", "Signature saved successfully", "success");
                    } else {
                        swal("Error!", response.message, "error");
                    }
                },
                error: function(xhr) {
                    swal("Error!", xhr.responseJSON?.message || "Failed to save signature", "error");
                }
            });
        }

        var table = $('#table-1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('approve.show') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false
                },
                {
                    data: 'tanggal_format',
                    name: 'request_tanggal'
                },
                {
                    data: 'request_kode',
                    name: 'request_kode'
                },
                {
                    data: 'divisi',
                    name: 'divisi'
                },
                {
                    data: 'departemen',
                    name: 'departemen'
                },
                {
                    data: 'status_badge',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        function showDetail(request_id) {
            $('#current_request_id').val(request_id);

            $.get("/admin/approval/detail/" + request_id, function(data) {
                let html = '';
                data.forEach(item => {
                    let statusBadge = '';
                    let signButton = '';
                    let actionButtons = '';

                    if (item.approval === 'Approve') {
                        statusBadge = '<span class="badge bg-success">Disetujui</span>';
                        signButton = `
                    <div>
                        <span class="badge bg-success">Signed</span>
                        <img src="/admin/approval/view-signature/${request_id}" 
                             style="max-width: 150px; margin-top: 5px; border: 1px solid #ddd;"
                             alt="Signature">
                    </div>`;
                    } else if (item.approval === 'Reject') {
                        statusBadge = '<span class="badge bg-danger">Ditolak</span>';
                        signButton = '<span class="badge bg-danger">Rejected</span>';
                    } else {
                        statusBadge = '<span class="badge bg-warning">Pending</span>';
                        signButton = `<button class="btn btn-sm btn-primary" onclick="showSignatureModal(${item.bm_id})">
                    <i class="fe fe-edit"></i> Sign
                </button>`;
                        actionButtons = `
                    <button class="btn btn-sm btn-success" onclick="setItemStatus(${item.bm_id}, 'Approve')">
                        <i class="fe fe-check"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="setItemStatus(${item.bm_id}, 'Reject')">
                        <i class="fe fe-x"></i>
                    </button>`;
                    }

                    html += `
                <tr id="row-${item.bm_id}">
                    <td>${item.barang_kode}</td>
                    <td>${item.barang_nama}</td>
                    <td>${item.bm_jumlah}</td>
                    <td>Rp ${parseFloat(item.harga).toLocaleString('id-ID')}</td>
                    <td>${item.divisi}</td>
                    <td>${item.keterangan}</td>
                    <td id="status-${item.bm_id}">${statusBadge}</td>
                    <td>${signButton}</td>
                    <td>${actionButtons}</td>
                </tr>`;
                });
                $('#detail-content').html(html);
                $('#modalDetail').modal('show');
            });
        }

        // Object untuk menyimpan status approval per item
        let itemApprovals = {};

        function setItemStatus(bm_id, status) {
            $.ajax({
                url: `/admin/approval/set-status/${bm_id}/${status}`,
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        let badge = status === 'Approve' ?
                            '<span class="badge bg-success">Disetujui</span>' :
                            '<span class="badge bg-danger">Ditolak</span>';
                        let signBadge = status === 'Approve' ?
                            '<span class="badge bg-success">Signed</span>' :
                            '<span class="badge bg-danger">Rejected</span>';

                        $(`#status-${bm_id}`).html(badge);
                        $(`#row-${bm_id} td:nth-child(8)`).html(signBadge); // Update signature column
                        $(`#row-${bm_id} td:last-child`).html(''); // Clear action buttons
                    } else {
                        swal("Error!", response.message, "error");
                    }
                },
                error: function() {
                    swal("Error!", "Failed to update status", "error");
                }
            });
        }

        function simpanApproval() {
            const request_id = $('#current_request_id').val();

            // Debug log
            console.log('Saving approvals:', {
                request_id: request_id,
                approvals: itemApprovals
            });

            if (Object.keys(itemApprovals).length === 0) {
                swal("Peringatan!", "Silakan pilih status approval untuk setiap item", "warning");
                return;
            }

            $.ajax({
                url: "/admin/approval/bulk-update",
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    request_id: request_id,
                    approvals: itemApprovals
                },
                beforeSend: function() {
                    // Tampilkan loading
                    swal({
                        title: "Loading...",
                        text: "Sedang memproses data",
                        icon: "info",
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(response) {
                    console.log('Response:', response);
                    if (response.success) {
                        swal({
                            title: "Berhasil!",
                            text: "Status approval berhasil disimpan",
                            icon: "success",
                            timer: 2000
                        }).then(() => {
                            $('#modalDetail').modal('hide');
                            itemApprovals = {}; // Reset approvals
                            table.ajax.reload();
                        });
                    } else {
                        swal("Error!", response.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', {
                        status: status,
                        error: error,
                        response: xhr.responseText
                    });
                    swal("Error!", "Terjadi kesalahan saat menyimpan data", "error");
                }
            });
            location.reload();
        }

        function setItemStatus(bm_id, status) {
            itemApprovals[bm_id] = status;
            console.log('Updated approvals:', itemApprovals); // Debug log

            // Update tampilan status
            let badgeClass = status === 'Approve' ? 'success' : 'danger';
            let statusText = status === 'Approve' ? 'Disetujui' : 'Ditolak';

            $(`#status-${bm_id}`).html(`<span class="badge bg-${badgeClass}">${statusText}</span>`);
        }

        function reject(id) {
            swal({
                    title: "Konfirmasi",
                    text: "Apakah anda yakin ingin menolak request ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willReject) => {
                    if (willReject) {
                        $.ajax({
                            url: "{{ url('admin/approval/reject') }}/" + id,
                            type: 'POST',
                            success: function(response) {
                                if (response.success) {
                                    swal("Berhasil!", response.message, "success");
                                    table.ajax.reload();
                                } else {
                                    swal("Error!", response.message, "error");
                                }
                            },
                            error: function(xhr) {
                                swal("Error!", "Terjadi kesalahan", "error");
                            }
                        });
                    }
                });
        }
    </script>
@endsection
