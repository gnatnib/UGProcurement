@extends('Master.Layouts.app', ['title' => $title])

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">{{$title}}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-gray">Transaksi</li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Data Approval</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-1" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <th class="border-bottom-0" width="1%">No</th>
                            <th class="border-bottom-0">Tanggal</th>
                            <th class="border-bottom-0">Kode Barang</th>
                            <th class="border-bottom-0">Nama Barang</th>
                            <th class="border-bottom-0">Jumlah</th>
                            <th class="border-bottom-0">Approval</th>
                            <th class="border-bottom-0" width="1%">Action</th>
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

    var table = $('#table-1').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('approve.getapprove') }}",
        "columns": [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false },
            { data: 'tgl', name: 'bm_tanggal' },
            { data: 'barang_kode', name: 'barang_kode' },
            { data: 'barang', name: 'barang_nama' },
            { data: 'bm_jumlah', name: 'bm_jumlah' },
            { data: 'approval', name: 'approval' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    function approve(id) {
        $.ajax({
            url: `/admin/approve/${id}`,
            type: 'POST',
            success: function (response) {
                table.ajax.reload();
                swal("Success", "Data berhasil diapprove", "success");
            },
            error: function (error) {
                swal("Error", "Terjadi kesalahan", "error");
            }
        });
    }

    function reject(id) {
        $.ajax({
            url: `/admin/approve/reject/${id}`,
            type: 'POST',
            success: function (response) {
                table.ajax.reload();
                swal("Success", "Data berhasil direject", "success");
            },
            error: function (error) {
                swal("Error", "Terjadi kesalahan", "error");
            }
        });
    }
</script>
@endsection