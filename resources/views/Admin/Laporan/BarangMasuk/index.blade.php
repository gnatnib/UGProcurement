@extends('Master.Layouts.app', ['title' => $title])

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Laporan Barang Masuk</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-gray">Laporan</li>
            <li class="breadcrumb-item active" aria-current="page">Barang Masuk</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Data</h3>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="" class="fw-bold">Filter Tanggal</label>
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
                    @if(!in_array(Session::get('user')->role_id, ['4', '5']))
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="divisi" id="divisi" class="form-control">
                                    <option value="">Semua Divisi</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division }}">{{ $division }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <button class="btn btn-success-light" onclick="filter()"><i class="fe fe-filter"></i>
                            Filter</button>
                        <button class="btn btn-secondary-light" onclick="reset()"><i class="fe fe-refresh-ccw"></i>
                            Reset</button>

                        <button class="btn btn-info-light" onclick="csv()"><i class="fa fa-file-excel-o"></i>
                            CSV</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table-1"
                        class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <th class="border-bottom-0" width="1%">No</th>
                            <th class="border-bottom-0">Tanggal Request</th>
                            <th class="border-bottom-0">Request ID</th>
                            <th class="border-bottom-0">Departemen</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Action</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ROW -->
@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let table;

    $(document).ready(function () {
        getData();
        
    });

    function getData() {
        table = $('#table-1').DataTable({
            "processing": true,
            "serverSide": true,
            "info": true,
            "order": [],
            "scrollX": true,
            "stateSave": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'Semua']
            ],
            "pageLength": 10,
            lengthChange: true,
            "ajax": {
                "url": "{{ route('lap-bm.getlap-bm') }}",
                "data": function (d) {
                    d.tglawal = $('input[name="tglawal"]').val();
                    d.tglakhir = $('input[name="tglakhir"]').val();
                    d.divisi = $('#divisi').val();
                }
            },
            "columns": [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable: false
            },
            {
                data: 'tgl',
                name: 'request_tanggal',
            },
            {
                data: 'request_id',
                name: 'request_id',
            },
            {
                data: 'departemen',
                name: 'departemen',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
            ]
        });

        // Add division filter change event
        $('#divisi').on('change', function () {
            filter();
        });
    }

    function filter() {
        var tglawal = $('input[name="tglawal"]').val();
        var tglakhir = $('input[name="tglakhir"]').val();
        var divisi = $('#divisi').val();

        if ((tglawal != '' && tglakhir != '') || divisi != '') {
            table.ajax.reload(null, false);
        } else {
            validasi("Isi minimal satu filter (tanggal atau divisi)!", 'warning');
        }
    }

    function reset() {
        $('input[name="tglawal"]').val('');
        $('input[name="tglakhir"]').val('');
        $('#divisi').val('');
        table.ajax.reload(null, false);
    }

    function pdf(id) {
        window.open("{{ route('lap-bm.pdf') }}?id=" + id, '_blank');
    }

    function validasi(judul, status) {
        swal({
            title: judul,
            type: status,
            confirmButtonText: "Iya."
        });
    }

    function csv() {
        window.location.href = "{{ route('lap-bm.csv') }}";
    }
</script>
@endsection