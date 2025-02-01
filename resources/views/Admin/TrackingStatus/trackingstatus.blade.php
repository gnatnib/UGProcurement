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
    <!-- FILTER SECTION -->
    <div class="card-body border-bottom">
        <form id="filterForm">
            <div class="row align-items-end mb-3">
                <div class="col-md-3">
                    <label class="form-label">Departemen</label>
                    <select class="form-control" name="departemen" id="filterDepartemen">
                        <option value="">Semua Departemen</option>
                        @foreach ($departemen as $d)
                            <option value="{{ $d }}">{{ $d }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Bulan</label>
                    <select class="form-control" name="bulan" id="filterBulan">
                        <option value="">Semua Bulan</option>
                        @foreach (range(1, 12) as $month)
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
                        @foreach (range($startYear, $endYear) as $year)
                            <option value="{{ $year }}" {{ $currentYear == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
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
                    <h3 class="card-title">Data Tracking Status</h3>
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
                    <h5 class="modal-title">Detail Status Tracking</h5>
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
                                    <th>Jumlah Item</th>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="simpanApproval()">Simpan Status</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Deklarasikan table sebagai variabel global
            window.table = $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('tracking.show') }}",
                    error: function(xhr, error, thrown) {
                        console.log('Error:', error);
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
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
        });

        // Object untuk menyimpan status tracking per item
        let itemApprovals = {};

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
                                <option value="Diproses" ${currentStatus === 'Diproses' ? 'selected' : ''}> Diproses</option>
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

        function setItemStatus(bm_id, status) {
            itemApprovals[bm_id] = status;

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
                swal("Peringatan!", "Silakan pilih status untuk setiap item", "warning");
                return;
            }

            $.ajax({
                url: "{{ url('admin/tracking/bulk-update') }}",
                type: 'POST',
                data: {
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
                            text: "Status tracking berhasil diupdate",
                            icon: "success",
                            timer: 1500,
                            buttons: false
                        }).then(() => {
                            // Reset item approvals
                            itemApprovals = {};

                            // Refresh table tanpa reload halaman
                            window.table.ajax.reload(null, false);

                            // Close modal
                            $('#modalDetail').modal('hide');
                        });
                    } else {
                        swal("Error!", response.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    swal("Error!", "Terjadi kesalahan saat menyimpan data", "error");
                }
            });
            location.reload();
        }
        function applyFilter() {
                const departemen = $('#filterDepartemen').val();
                const bulan = $('#filterBulan').val();
                const tahun = $('#filterTahun').val();

                table.ajax.url("{{ route('tracking.show') }}?" + $.param({
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
