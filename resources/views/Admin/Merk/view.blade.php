@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <div class="page-header">
        <h1 class="page-title">{{ $title }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Daftar Merk Barang</h3>
                    <a href="/admin/dashboard" class="btn btn-primary">Kembali ke Dashboard</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">No</th>
                                    <th class="border-bottom-0">Nama Merk</th>
                                    <th class="border-bottom-0">Jenis Barang</th>
                                    <th class="border-bottom-0">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($merk as $m)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $m->merk_nama }}</td>
                                        <td>{{ $m->jenisbarang_nama }}</td>
                                        <td>{{ $m->merk_keterangan ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#basic-datatable')) {
                $('#basic-datatable').DataTable().destroy();
            }

            $('#basic-datatable').DataTable({
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
