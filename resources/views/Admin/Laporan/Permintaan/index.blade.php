@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <div class="page-header">
        <h1 class="page-title">Laporan Permintaan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Laporan</li>
                <li class="breadcrumb-item active" aria-current="page">Permintaan</li>
            </ol>
        </div>
    </div>

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
                                <input type="text" name="tglawal" class="form-control datepicker-date" placeholder="Tanggal Awal">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="tglakhir" class="form-control datepicker-date" placeholder="Tanggal Akhir">
                            </div>
                        </div>
                        <div class="col-md-3" id="divisionFilter" style="display: none;">
                            <div class="form-group">
                                <select name="divisi" class="form-control">
                                    <option value="">Semua Divisi</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division }}">{{ $division }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success-light" onclick="filter()"><i class="fe fe-filter"></i> Filter</button>
                            <button class="btn btn-secondary-light" onclick="reset()"><i class="fe fe-refresh-ccw"></i> Reset</button>
                            <button class="btn btn-info-light" onclick="csv()"><i class="fa fa-file-excel-o"></i> CSV</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table-1" class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <th class="border-bottom-0" width="1%">No</th>
                                <th class="border-bottom-0">Tanggal Request</th>
                                <th class="border-bottom-0">Request ID</th>
                                <th class="border-bottom-0">Departemen</th>
                                <th class="border-bottom-0">Action</th>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
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
        "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, 'Semua']],
        "pageLength": 10,
        lengthChange: true,
        "ajax": {
            "url": "{{ route('lap-permintaan.getlap-permintaan') }}",
            "data": function(d) {
                d.tglawal = $('input[name="tglawal"]').val();
                d.tglakhir = $('input[name="tglakhir"]').val();
                d.divisi = $('select[name="divisi"]').val();
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
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                ]
            });

    // Add division filter change event
    $('select[name="divisi"]').on('change', function() {
        table.ajax.reload();
    });
        }

        function filter() {
            var tglawal = $('input[name="tglawal"]').val();
            var tglakhir = $('input[name="tglakhir"]').val();
            if (tglawal != '' && tglakhir != '') {
                table.ajax.reload(null, false);
            } else {
                validasi("Isi dulu Form Filter Tanggal!", 'warning');
            }
        }

        function reset() {
            $('input[name="tglawal"]').val('');
            $('input[name="tglakhir"]').val('');
            table.ajax.reload(null, false);
        }


        function pdf(id) {
            window.open("{{ route('lap-permintaan.pdf') }}?id=" + id, '_blank');
        }

        function validasi(judul, status) {
            swal({
                title: judul,
                type: status,
                confirmButtonText: "Iya."
            });
        }

        

        function csv() {
    var tglawal = $('input[name="tglawal"]').val();
    var tglakhir = $('input[name="tglakhir"]').val();
    var divisi = $('select[name="divisi"]').val();
    
    if (tglawal != '' && tglakhir != '') {
        $.ajax({
            url: "{{ route('lap-permintaan.csv') }}",
            type: 'GET',
            data: {
                tglawal: tglawal,
                tglakhir: tglakhir,
                divisi: divisi
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response, status, xhr) {
                if (response.type === 'application/json') {
                    // Handle error response
                    var reader = new FileReader();
                    reader.onload = function() {
                        var errorResponse = JSON.parse(this.result);
                        swal({
                            title: "Perhatian!",
                            text: errorResponse.message,
                            type: "warning",
                            confirmButtonText: "Ok"
                        });
                    };
                    reader.readAsText(response);
                } else {
                    // Format tanggal untuk nama file
                    var startDate = moment(tglawal).format('DDMMYYYY');
                    var endDate = moment(tglakhir).format('DDMMYYYY');
                    var filename = 'laporan_permintaan_' + startDate + '_sd_' + endDate + '.csv';
                    
                    // Buat blob dan download
                    var blob = new Blob([response], { type: 'text/csv' });
                    var downloadUrl = window.URL.createObjectURL(blob);
                    var a = document.createElement("a");
                    a.href = downloadUrl;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(downloadUrl);
                    a.remove();
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error!",
                    text: "Tidak ada data pada periode yang dipilih",
                    type: "error",
                    confirmButtonText: "Ok"
                });
            }
        });
    } else {
        validasi("Isi dulu Form Filter Tanggal!", 'warning');
    }
}

$(document).ready(function() {
    const userRole = "{{ Session::get('user')->role_id }}";
    if (userRole === '2' || userRole === '3') {
        $('#divisionFilter').show();
    }
    
    $('select[name="divisi"]').on('change', function() {
        table.ajax.reload();
    });
    
    // Update filter function
    function filter() {
        var tglawal = $('input[name="tglawal"]').val();
        var tglakhir = $('input[name="tglakhir"]').val();
        var divisi = $('select[name="divisi"]').val();
        
        if (tglawal != '' && tglakhir != '') {
            table.ajax.reload(null, false);
        } else {
            validasi("Isi dulu Form Filter Tanggal!", 'warning');
        }
    }
});
    </script>
@endsection