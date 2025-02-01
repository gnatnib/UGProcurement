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
                            Tambah Barang Masuk untuk Request: {{ $request_data->request_id }}
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
                                    <th>Barang</th>
                                    <th>Jumlah Item</th>
                                    <th>Harga</th>
                                    <th>Approval</th>
                                    <th>Request ID</th>
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
                                            <label class="text-muted small mb-1">Barang</label>
                                            <div id="detail-barang" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Jumlah Item</label>
                                            <div id="detail-jumlah" class="fs-6 fw-semibold"></div>
                                        </div>
                                        <div>
                                            <label class="text-muted small mb-1">Harga</label>
                                            <div id="detail-harga" class="fs-6 fw-semibold text-success"></div>
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
                        d.request_id = new URLSearchParams(window.location.search).get('request_id');
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
                        data: 'jumlah_item', // Updated to use the new column
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
                        data: 'approval',
                        name: 'approval'
                    },
                    {
                        data: 'request_id',
                        name: 'request_id'
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
        });

        function showDetail(data) {
            $('#detail-bmkode').text(data.bm_kode);
            $('#detail-tanggal').text(data.tgl);
            $('#detail-barang').text(data.barang);
            $('#detail-jumlah').text(data.bm_jumlah + ' ' + data.satuan);
            $('#detail-requestid').text(data.request_id);
            $('#detail-keterangan').text(data.keterangan || '-');
            $('#detail-harga').text('Rp ' + parseInt(data.harga).toLocaleString('id-ID'));

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
    </script>
@endsection
