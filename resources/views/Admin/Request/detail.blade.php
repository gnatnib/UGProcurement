@extends('Master.Layouts.app', ['title' => $title])

@section('content')
<div class="page-header">
    <h1 class="page-title">Detail Request Barang</h1>
</div>
<div class="card">
    <div class="card-body">
        <h4>Detail Header</h4>
        <p><strong>Kode Request:</strong> {{ $header->request_kode }}</p>
        <p><strong>Tanggal:</strong> {{ $header->request_tanggal }}</p>
        <p><strong>Departemen:</strong> {{ $header->departemen }}</p>
        <hr>
        <h4>Detail Barang</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                {{-- Render data detail di sini --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
