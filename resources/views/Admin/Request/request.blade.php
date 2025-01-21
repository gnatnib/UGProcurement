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

<!-- ROW -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Data Request</h3>
                @if($hakTambah > 0)
                <div>
                    <button class="btn btn-primary-light" onclick="addRequest()">
                        Tambah Request <i class="fe fe-plus"></i>
                    </button>
                    <!-- Button Tambah Barang -->
                    <a href="{{ route('barang-masuk.index') }}" class="btn btn-success-light">
                        Tambah Barang Masuk <i class="fe fe-plus"></i>
                    </a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-1" class="table table-bordered text-nowrap border-bottom dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Tanggal Request</th>
                                <th>Kode Request</th>
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
@endsection

@section('scripts')
<script>
// Fungsi Tambah Request
function addRequest() {
    $.ajax({
        url: '/admin/request-barang/store', 
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log('Response:', response);
            if (response.success) {
                alert('Request berhasil ditambahkan!');
                location.reload(); 
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', xhr.responseText);
            alert('Terjadi kesalahan!');
        }
    });
}

// Setup DataTable
$(document).ready(function() {
    var table = $('#table-1').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin/request-barang/getdata",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tanggal_format', name: 'request_tanggal'},
            {data: 'request_kode', name: 'request_kode'},
            {data: 'departemen', name: 'departemen'},
            {data: 'status', name: 'status'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false,
                render: function(data, type, row) {
                    // Tampilkan tombol Delete
                    return '<button onclick="deleteRequest(' + row.request_id + ')" class="btn btn-sm btn-danger">Delete</button>';
                }
            }
        ]
    });
});

// Fungsi untuk hapus request
// Fungsi untuk hapus request
function deleteRequest(requestId) {
    if (confirm('Apakah Anda yakin ingin menghapus request ini?')) {
        $.ajax({
            url: '/admin/request-barang/delete',  // Pastikan URL untuk hapus sesuai
            type: 'DELETE',  // Gunakan DELETE
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                request_id: requestId
            },
            success: function(response) {
                console.log('Delete Response:', response);
                if (response.success) {
                    alert('Request berhasil dihapus!');
                    location.reload();  // Reload halaman setelah penghapusan
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Delete Error:', xhr.responseText);
                alert('Terjadi kesalahan saat menghapus data!');
            }
        });
    }
}

</script>
@endsection
