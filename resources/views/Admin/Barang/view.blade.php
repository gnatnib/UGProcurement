@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Daftar Barang</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Barang</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Daftar Semua Barang</h3>
                    <a href="/admin/dashboard" class="btn btn-primary">Kembali ke Dashboard</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-1" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">No</th>
                                    <th class="border-bottom-0">Gambar</th>
                                    <th class="border-bottom-0">Kode</th>
                                    <th class="border-bottom-0">Nama Barang</th>
                                    <th class="border-bottom-0">Jenis</th>
                                    <th class="border-bottom-0">Satuan</th>
                                    <th class="border-bottom-0">Merk</th>
                                    <th class="border-bottom-0">Harga</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW END -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: {
                    url: "{{ route('barang.show') }}",
                    type: "GET",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'img',
                        name: 'img',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'barang_kode',
                        name: 'barang_kode'
                    },
                    {
                        data: 'barang_nama',
                        name: 'barang_nama'
                    },
                    {
                        data: 'jenisbarang',
                        name: 'jenisbarang'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'merk',
                        name: 'merk'
                    },
                    {
                        data: 'currency',
                        name: 'currency'
                    },
                ],
                language: {
                    paginate: {
                        previous: '<i class="fa fa-angle-left"></i>',
                        next: '<i class="fa fa-angle-right"></i>'
                    }
                }
            });
        });
    </script>
@endsection
