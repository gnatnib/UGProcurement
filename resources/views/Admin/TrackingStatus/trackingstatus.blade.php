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
                                    <th>Divisi</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="detail-content"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-red" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="simpanApproval()">Simpan Status</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#table-1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tracking.show') }}",
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

            $.get("{{ url('admin/tracking/detail') }}/" + request_id, function(data) {
                let html = '';
                data.forEach(item => {
                    let badgeClass;
                    let currentStatus = item.tracking_status || 'Pending';

                    switch (currentStatus) {
                        case 'Diproses':
                            badgeClass = 'warning';
                            break;
                        case 'Dikirim':
                            badgeClass = 'info';
                            break;
                        case 'Diterima':
                            badgeClass = 'success';
                            break;
                        default:
                            badgeClass = 'secondary';
                    }

                    html += `
                <tr id="row-${item.bm_id}">
                    <td>${item.barang_kode}</td>
                    <td>${item.barang_nama}</td>
                    <td>${item.bm_jumlah}</td>
                    <td>${item.divisi}</td>
                    <td>${item.keterangan}</td>
                    <td id="status-${item.bm_id}">
                        <span class="badge bg-${badgeClass}">${currentStatus}</span>
                    </td>
                    <td>
                        <select class="form-select form-select-sm" onchange="setItemStatus(${item.bm_id}, this.value)">
                            <option value="">Pilih Status</option>
                            <option value="Diproses" ${currentStatus === 'Diproses' ? 'selected' : ''}>Diproses</option>
                            <option value="Dikirim" ${currentStatus === 'Dikirim' ? 'selected' : ''}>Dikirim</option>
                            <option value="Diterima" ${currentStatus === 'Diterima' ? 'selected' : ''}>Diterima</option>
                        </select>
                    </td>
                </tr>
            `;
                });
                $('#detail-content').html(html);
                $('#modalDetail').modal('show');
            });
        }

        // Object untuk menyimpan status approval per item
        let itemApprovals = {};

        function setItemStatus(bm_id, status) {
            itemApprovals[bm_id] = status;

            // Update badge display
            let badgeClass;
            switch (status) {
                case 'Diproses':
                    badgeClass = 'warning';
                    break;
                case 'Dikirim':
                    badgeClass = 'info';
                    break;
                case 'Diterima':
                    badgeClass = 'success';
                    break;
                default:
                    badgeClass = 'secondary';
            }

            $(`#status-${bm_id}`).html(`<span class="badge bg-${badgeClass}">${status || 'Pending'}</span>`);
        }

        function simpanApproval() {
            const request_id = $('#current_request_id').val();

            if (Object.keys(itemApprovals).length === 0) {
                swal("Peringatan!", "Silakan pilih status approval untuk setiap item", "warning");
                return;
            }

            $.ajax({
                url: "/admin/tracking/bulk-update",
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
                            text: "Status tracking terbaru berhasil disimpan",
                            icon: "success",
                            timer: 1500,
                            buttons: false
                        }).then(() => {
                            // Close the modal
                            $('#modalDetail').modal('hide');

                            // Reset approvals
                            itemApprovals = {};

                            // Refresh the table
                            table.ajax.reload(null, false);

                            // Reopen the detail modal with updated data
                            setTimeout(() => {
                                showDetail(request_id);
                            }, 500);
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
        }

        function setItemStatus(bm_id, status) {
            itemApprovals[bm_id] = status;

            // Update badge display
            let badgeClass;
            switch (status) {
                case 'Diproses':
                    badgeClass = 'warning';
                    break;
                case 'Dikirim':
                    badgeClass = 'info';
                    break;
                case 'Diterima':
                    badgeClass = 'success';
                    break;
                default:
                    badgeClass = 'secondary';
            }

            $(`#status-${bm_id}`).html(`<span class="badge bg-${badgeClass}">${status}</span>`);
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
                            url: "{{ url('admin/tracking/reject') }}/" + id,
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
