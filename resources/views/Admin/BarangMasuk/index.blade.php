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
    <!-- PAGE-HEADER END -->


    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">
                        @if (isset($request_data))
                            Tambah Barang Masuk untuk Request ID: {{ $request_data->request_id }}
                        @else
                            Data Barang Masuk
                        @endif
                    </h3>
                    @if ($hakTambah > 0)
                        <div>
                            <a class="modal-effect btn btn-primary-light" onclick="generateID()"
                                data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">Tambah Data
                                <i class="fe fe-plus"></i></a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1"
                            class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Total Harga</th>
                                    <th>Approval</th>
                                    <th>Tracking Status</th>
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
                    <h5 class="modal-title fw-bold">Detail Barang Masuk</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <!-- Informasi Barang -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-4 text-primary">Informasi Barang</h6>
                                    <div class="d-flex flex-column gap-3">
                                        <div>
                                            <label class="text-muted small mb-1">Kode BM</label>
                                            <div id="detail-bmkode" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Nama Barang</label>
                                            <div id="detail-barang" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Jenis Barang</label>
                                            <div id="detail-jenis" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Merk</label>
                                            <div id="detail-merk" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Jumlah Barang</label>
                                            <div id="detail-jumlah" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Harga Satuan</label>
                                            <div id="detail-harga" class="fs-6 fw-semibold text-success"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Total Harga</label>
                                            <div id="detail-total-harga" class="fs-6 fw-semibold text-success"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Transaksi -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-4 text-primary">Detail Transaksi</h6>
                                    <div class="d-flex flex-column gap-3">
                                        <div>
                                            <label class="text-muted small mb-1">Tanggal Permintaan</label>
                                            <div id="detail-tanggal" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Request ID</label>
                                            <div id="detail-requestid" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Status Approval</label>
                                            <div id="detail-approval" class="fs-6 mt-1"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Status Pengiriman</label>
                                            <div id="detail-tracking" class="fs-6 mt-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-3 text-primary">Keterangan</h6>
                                    <p id="detail-keterangan" class="text-muted mb-0 fs-6"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <!-- END ROW -->

    @include('Admin.BarangMasuk.tambah')
    @include('Admin.BarangMasuk.edit')
    @include('Admin.BarangMasuk.hapus')
    @include('Admin.BarangMasuk.barang')

    <script>
        function generateID() {
            id = new Date().getTime();
            $("input[name='bmkode']").val("BM-" + id);

            // If request_id is available in URL, set it in a hidden input
            const urlParams = new URLSearchParams(window.location.search);
            const requestId = urlParams.get('request_id');
            if (requestId) {
                $("input[name='request_id']").val(requestId);
            }
        }

        function update(data) {
            $("input[name='idbmU']").val(data.bm_id);
            $("input[name='bmkodeU']").val(data.bm_kode);
            $("input[name='kdbarangU']").val(data.barang_kode);
            $("select[name='UseridU']").val(data.user_id);
            $("input[name='jmlU']").val(data.bm_jumlah);

            getbarangbyidU(data.barang_kode);

            $("input[name='tglmasukU").bootstrapdatepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            }).bootstrapdatepicker("update", data.bm_tanggal);
        }

        function hapus(data) {
            $("input[name='idbm']").val(data.bm_id);
            $("#vbm").html("Kode BM " + "<b>" + data.bm_kode + "</b>");
        }

        function validasi(judul, status) {
            swal({
                title: judul,
                type: status,
                confirmButtonText: "Iya."
            });
        }
    </script>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table;
        $(document).ready(function() {
            // Check if DataTable is already initialized
            if (!$.fn.DataTable.isDataTable('#table-1')) {
                table = $('#table-1').DataTable({
                    processing: true,
                    serverSide: true,
                    info: true,
                    order: [
                        [5, 'desc']
                    ],
                    ajax: {
                        url: "{{ route('barang-masuk.getbarang-masuk') }}",
                        data: function(d) {
                            d.request_id = new URLSearchParams(window.location.search).get(
                                'request_id');
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false
                        },
                        {
                            data: 'tgl',
                            name: 'bm_tanggal'
                        },
                        {
                            data: 'barang',
                            name: 'barang_nama'
                        },
                        {
                            data: 'jumlah_item',
                            name: 'bm_jumlah'
                        },
                        {
                            data: 'harga',
                            name: 'harga',
                            render: function(data) {
                                return 'Rp ' + parseFloat(data).toLocaleString('id-ID');
                            }
                        },
                        {
                            data: null,
                            name: 'total_harga',
                            render: function(data) {
                                const total = parseFloat(data.harga) * parseFloat(data.bm_jumlah);
                                return 'Rp ' + total.toLocaleString('id-ID');
                            }
                        },
                        {
                            data: 'approval',
                            name: 'approval'
                        },
                        {
                            data: 'tracking_status',
                            name: 'tracking_status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    createdRow: function(row, data) {
                        $(row).css('cursor', 'pointer');
                        $(row).find('td:not(:last-child)').on('click', function() {
                            showDetail(data);
                        });
                    }
                });
            }
        });

        function showDetail(data) {
            $('#detail-bmkode').text(data.bm_kode);
            $('#detail-tanggal').text(data.tgl);
            $('#detail-barang').text(data.barang);
            $('#detail-jenis').text(data.jenis || '-');
            $('#detail-merk').text(data.merk || '-');
            $('#detail-jumlah').text(data.bm_jumlah + ' ' + (data.satuan || ''));
            $('#detail-requestid').text(data.request_id);
            $('#detail-keterangan').text(data.keterangan || '-');
            $('#detail-harga').text('Rp ' + parseInt(data.harga).toLocaleString('id-ID'));

            const totalHarga = parseInt(data.harga) * parseInt(data.bm_jumlah);
            $('#detail-total-harga').text('Rp ' + totalHarga.toLocaleString('id-ID'));

            let approvalStatus = data.approval || 'PENDING';
            let approvalClass = data.approval ? 'bg-success' : 'bg-warning';
            let approvalBadge = `
                <div class="d-inline-block">
                    <span class="badge rounded-pill ${approvalClass}-gradient px-3 py-2">
                        <i class="fe fe-check-circle me-1"></i>
                        ${approvalStatus}
                    </span>
                </div>`;

            let trackingStatus = data.tracking_status || 'PENDING';
            let trackingClass = data.tracking_status ? 'bg-success' : 'bg-warning';
            let trackingBadge = `
                <div class="d-inline-block">
                    <span class="badge rounded-pill ${trackingClass}-gradient px-3 py-2">
                        <i class="fe fe-truck me-1"></i>
                        ${trackingStatus}
                    </span>
                </div>`;

            $('#detail-approval').html(approvalBadge);
            $('#detail-tracking').html(trackingBadge);

            $('#detailModal').modal('show');
        }

        function getCurrentPrice(barangKode) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '/admin/barang/get-price/' + barangKode,
                    method: 'GET',
                    success: function(response) {
                        resolve(response.harga);
                    },
                    error: function(xhr) {
                        reject('Gagal mendapatkan harga');
                    }
                });
            });
        }

        // Update price when barang is selected (for add form)
        $("select[name='barang']").change(function() {
            const barangKode = $(this).val();
            if (barangKode) {
                getCurrentPrice(barangKode)
                    .then(harga => {
                        $("input[name='harga']").val(harga);
                        calculateTotal();
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });

        function calculateTotal() {
            const jumlah = parseFloat($("input[name='jml']").val()) || 0;
            const harga = parseFloat($("input[name='harga']").val()) || 0;
            const total = jumlah * harga;
            $("#total-harga").text('Rp ' + total.toLocaleString('id-ID'));
        }

        // Update total when quantity or price changes
        $("input[name='jml'], input[name='harga']").on('input', calculateTotal);

        // For edit form
        function getbarangbyidU(kode) {
            getCurrentPrice(kode)
                .then(data => {
                    $("input[name='hargaU']").val(data.harga);
                    calculateTotalU();
                })
                .catch(error => {
                    console.error(error);
                });
        }

        function calculateTotalU() {
            const jumlah = parseFloat($("input[name='jmlU']").val()) || 0;
            const harga = parseFloat($("input[name='hargaU']").val()) || 0;
            const total = jumlah * harga;
            $("#total-hargaU").text('Rp ' + total.toLocaleString('id-ID'));
        }

        $("input[name='jmlU'], input[name='hargaU']").on('input', calculateTotalU);
    </script>
@endsection
