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
    <div class="card-body border-bottom">
        <form id="filterForm">
            <div class="row align-items-end mb-3">
                <div class="col-md-3">
                    <label class="form-label">Departemen</label>
                    <select class="form-control" name="departemen" id="filterDepartemen">
                        <option value="">Semua Departemen</option>
                        @foreach($departemen as $d)
                            <option value="{{ $d }}">{{ $d }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Bulan</label>
                    <select class="form-control" name="bulan" id="filterBulan">
                        <option value="">Semua Bulan</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}" {{ date('n') == $month ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Tahun</label>
                    <select class="form-control" name="tahun" id="filterTahun">
                        <option value="">Semua Tahun</option>
                        @php
                            $currentYear = date('Y');
                            $startYear = $currentYear - 3;
                            $endYear = $currentYear + 1;
                        @endphp
                        @foreach(range($startYear, $endYear) as $year)
                            <option value="{{ $year }}" {{ $currentYear == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" onclick="applyFilter()">
                        <i class="fe fe-filter"></i> Filter
                    </button>
                    <button type="button" class="btn btn-light" onclick="resetFilter()">
                        <i class="fe fe-refresh-cw"></i> Reset
                    </button>
                </div>
            </div>
        </form>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title">Detail Request Barang</h5>
                    <button type="button" class="btn btn-primary" onclick="showSignatureModal()">
                        <i class="fe fe-edit-2"></i> Sign Request
                    </button>
                </div>
    
                <!-- Signature Area -->
                <div class="mx-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="card-title mb-0">Signatures</h6>
                            </div>
                            <div id="signature-display" class="d-flex flex-wrap gap-4">
                                <!-- Signatures here -->
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="modal-body">
                    <input type="hidden" id="current_request_id">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Kode</th>
                                    <th style="width: 20%">Nama Barang</th>
                                    <th style="width: 8%">Jumlah</th>
                                    <th style="width: 12%">Harga</th>
                                    <th style="width: 15%">Divisi</th>
                                    <th>Keterangan</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody id="detail-content"></tbody>
                        </table>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="simpanApproval()">Simpan Approval</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Signature Modal -->
    <div class="modal fade" id="signatureModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Draw Signature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
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
    <div class="modal fade" id="rejectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alasan Penolakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="reject_bm_id">
                    <div class="form-group">
                        <label>Keterangan Penolakan</label>
                        <textarea id="reject_reason" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="submitReject()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <style>
    /* General Table Styles */
    .table {
        width: 100%;
        margin-bottom: 0;
        font-size: 13px;
    }
    
    .table th {
        background: #f8f9fa;
        font-weight: 600;
        text-transform: uppercase;
        padding: 12px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
    }
    
    .table td {
        padding: 12px;
        vertical-align: middle;
    }
    
    .table td:not(:nth-child(6)) {
        white-space: nowrap;
    }
    
    /* Signature Styles */
    #signature-display {
        min-height: 80px;
    }
    
    .signature-item {
        background: white;
        padding: 12px;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .signature-item img {
        max-width: 120px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        padding: 2px;
    }
    
    /* Action Button Styles */
    .action-btn-group {
        display: flex;
        gap: 5px;
        justify-content: center;
    }
    
    .action-btn-group .btn {
        padding: 4px 8px;
    }
    </style>
    ```
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

        function showSignatureModal(request_id) {
            $('#current_request_id').val(request_id);
            $('#signatureModal').modal('show');
        }


        function saveSignature() {
            if (!signaturePad || signaturePad.isEmpty()) {
                swal("Error!", "Please provide signature", "error");
                return;
            }

            const request_id = $('#current_request_id').val();
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
                        swal("Success!", "Signature saved successfully", "success").then(() => {
                            // Refresh the detail view to show the new signature
                            showDetail(request_id);
                        });
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
                    data: 'request_id',
                    name: 'request_id'
                },
                {
                    data: 'divisi',
                    name: 'divisi'
                },
                {
                    data: 'departemen', // Add this column
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
                    searchable: false,
                    render: function(data, type, row) {
                        return `<button type="button" class="btn btn-success btn-sm" onclick="showDetail('${row.request_id}')">
                    <i class="fe fe-eye"></i> Detail
                </button>`;
                    }
                }
            ]
        });

function numberFormat(number) {
    return new Intl.NumberFormat('id-ID').format(number);
}


        function showDetail(request_id) {
            $('#current_request_id').val(request_id);
            itemApprovals = {};

            Promise.all([
                $.get("/admin/approval/detail/" + request_id),
                $.get("/admin/approval/view-signature/" + request_id)
            ]).then(([data, signatureData]) => {
                // Render signatures di area atas
                let signatureDisplay = '';
                if (signatureData.success && signatureData.signatures?.length > 0) {
                    signatureData.signatures.forEach(sig => {
                        signatureDisplay += `
                            <div class="text-center me-4">
                                <span class="badge bg-success mb-2">Signed by ${sig.signer_type}</span>
                                <img src="${sig.signature}" class="border rounded p-1" style="max-width: 150px;">
                            </div>`;
                    });
                }
                $('#signature-display').html(signatureDisplay);

                // Cek status tanda tangan
                const hasGMSignature = signatureData.signatures?.some(s => s.signer_type === 'GM');
                const hasGMHCGASignature = signatureData.signatures?.some(s => s.signer_type === 'GMHCGA');
                const currentUserRole = '{{ Session::get('user')->role_id }}';

                // Render table content
                let html = '';
                data.forEach(item => {
                    const showActions = !(
                        (currentUserRole === '2' && hasGMHCGASignature) || 
                        (currentUserRole === '4' && hasGMSignature)
                    );

                    let actionButtons = '';
                    if (item.approval !== 'Approve' && item.approval !== 'Reject' && showActions) {
                        actionButtons = `
                            <div class="btn-group">
                                <button class="btn btn-sm btn-success" onclick="setItemStatus(${item.bm_id}, 'Approve')">
                                    <i class="fe fe-check"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="showRejectModal(${item.bm_id})">
                                    <i class="fe fe-x"></i>
                                </button>
                            </div>`;
                    }

                    html += `
                        <tr>
                            <td>${item.barang_kode}</td>
                            <td>${item.barang_nama}</td>
                            <td class="text-center">${item.bm_jumlah}</td>
                            <td class="text-end">Rp ${numberFormat(item.harga)}</td>
                            <td>${item.divisi}</td>
                            <td>${item.keterangan}</td>
                            <td class="text-center" id="status-${item.bm_id}">${getStatusBadge(item.approval)}</td>
                            <td class="text-center">${actionButtons}</td>
                            <td></td>
                        </tr>`;

                    if (showActions) {
                        itemApprovals[item.bm_id] = item.approval || 'pending';
                    }
                });

                $('#detail-content').html(html);
                $('#modalDetail').modal('show');
            });
}

        // Object untuk menyimpan status approval per item
        let itemApprovals = {};


        function getStatusBadge(status) {
    const badges = {
        'Approve': '<span class="badge bg-success">Disetujui</span>',
        'Reject': '<span class="badge bg-danger">Ditolak</span>',
        'pending': '<span class="badge bg-warning">Pending</span>'
    };
    return badges[status] || badges.pending;
}

        function setItemStatus(bm_id, status) {
    itemApprovals[bm_id] = status;
    $(`#status-${bm_id}`).html(getStatusBadge(status));
}

        function simpanApproval() {
            const request_id = $('#current_request_id').val();

            // Check if there are any items to approve
            if (Object.keys(itemApprovals).length === 0) {
                swal("Peringatan!", "Tidak ada item untuk diapprove", "warning");
                return;
            }

            // Check if all items have been processed
            const hasUnprocessedItems = Object.values(itemApprovals).some(status => status === 'pending');
            if (hasUnprocessedItems) {
                swal("Peringatan!", "Silakan pilih status Approve/Reject untuk semua item", "warning");
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
                    swal({
                        title: "Loading...",
                        text: "Sedang memproses data",
                        icon: "info",
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(response) {
                    if (response.success) {
                        swal({
                            title: "Berhasil!",
                            text: "Status approval berhasil disimpan",
                            icon: "success",
                            timer: 2000
                        }).then(() => {
                            $('#modalDetail').modal('hide');
                            itemApprovals = {};
                            table.ajax.reload();
                        });
                    } else {
                        swal("Error!", response.message, "error");
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    swal("Error!", xhr.responseJSON?.message || "Terjadi kesalahan saat menyimpan data",
                        "error");
                }
            });
        }

        function setItemStatus(bm_id, status) {
            2
            itemApprovals[bm_id] = status;
            console.log('Updated approvals:', itemApprovals); // Debug log

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

        function showSignatureModal() {
    $('#signatureModal').modal('show');
}

// Initialize signature pad when modal shown
$('#signatureModal').on('shown.bs.modal', function() {
    const canvas = document.getElementById('signaturePad');
    signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)'
    });
});

    function showRejectModal(bm_id) {
            $('#reject_bm_id').val(bm_id);
            $('#reject_reason').val('');
            $('#rejectModal').modal('show');
        }

        function submitReject() {
            const bm_id = $('#reject_bm_id').val();
            const reason = $('#reject_reason').val();

            if (!reason) {
                swal("Error!", "Keterangan penolakan harus diisi", "error");
                return;
            }

            setItemStatus(bm_id, 'Reject', reason);
            $('#rejectModal').modal('hide');
        }

        // Modify setItemStatus to handle rejection reason
        function setItemStatus(bm_id, status, reason = '') {
            itemApprovals[bm_id] = {
                status: status,
                reason: reason
            };

            let badgeClass = status === 'Approve' ? 'success' : 'danger';
            let statusText = status === 'Approve' ? 'Disetujui' : 'Ditolak';

            $(`#status-${bm_id}`).html(`<span class="badge bg-${badgeClass}">${statusText}</span>`);
        }

        function applyFilter() {
                const departemen = $('#filterDepartemen').val();
                const bulan = $('#filterBulan').val();
                const tahun = $('#filterTahun').val();

                table.ajax.url("{{ route('approve.show') }}?" + $.param({
                    departemen: departemen,
                    bulan: bulan,
                    tahun: tahun
                })).load();
            }

            function resetFilter() {
                $('#filterDepartemen').val('');
                $('#filterBulan').val('');
                $('#filterTahun').val('');
                applyFilter();
            }

    </script>
@endsection
