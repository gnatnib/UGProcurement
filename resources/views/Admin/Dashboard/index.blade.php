@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW 1 OPEN -->
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $jenis }}</h2>
                            <p class="text-white mb-0">Jenis Barang </p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-package text-white fs-40 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-azure img-card box-secondary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $satuan }}</h2>
                            <p class="text-white mb-0">Satuan Barang</p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-package text-white fs-40 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-cyan img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $merk }}</h2>
                            <p class="text-white mb-0">Merk Barang</p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-package text-white fs-40 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $barang }}</h2>
                            <p class="text-white mb-0">Barang</p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-package text-white fs-40 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $bm }}</h2>
                            <p class="text-white mb-0">Barang Masuk</p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-repeat text-white fs-40 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-danger-gradient img-card box-danger-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $bk }}</h2>
                            <p class="text-white mb-0">Barang Keluar</p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-repeat text-white fs-40 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-warning-gradient img-card box-warning-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $active_requests }}</h2>
                            <p class="text-white mb-0">Active Requests</p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-file-text text-white fs-40 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-lime-dark img-card box-warning-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $user }}</h2>
                            <p class="text-white mb-0">User</p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-user text-white fs-40 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
    </div>
    <!-- ROW 1 CLOSED -->
    @if(Session::get('user')->role_id == 2 || Session::get('user')->role_id == 3)
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Division Bookings</h3>
                </div>
                <div class="card-body">
                    <div id="donutChart"></div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/admin/division-bookings')
            .then(response => response.json())
            .then(result => {
                if (result.success && result.data.length > 0) {
                    const options = {
                        series: result.data.map(item => item.total),
                        chart: {
                            type: 'donut',
                            height: 350,
                            animations: {
                                enabled: true
                            }
                        },
                        labels: result.data.map(item => item.divisi),
                        colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#546E7A', '#26a69a'],
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '70%'
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };
    
                    const chart = new ApexCharts(document.querySelector("#donutChart"), options);
                    chart.render();
                }
            })
            .catch(error => console.error('Error:', error));
    });
    </script>
    @endpush
    @endif

    <style>
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px) scale(1.005);
            box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.2);
        }

        .card-body {
            transition: all 0.3s ease;
        }

        .card:hover .fe {
            transform: scale(1.1) rotate(5deg);
        }

        .fe {
            transition: all 0.3s ease;
        }

        /* Optional: Add a subtle glow effect on hover */
        .bg-primary.img-card:hover {
            box-shadow: 0 4px 25px 0 rgba(51, 102, 255, 0.25);
        }

        .bg-secondary.img-card:hover {
            box-shadow: 0 4px 25px 0 rgba(108, 117, 125, 0.25);
        }

        .bg-success.img-card:hover {
            box-shadow: 0 4px 25px 0 rgba(40, 167, 69, 0.25);
        }

        .bg-info.img-card:hover {
            box-shadow: 0 4px 25px 0 rgba(23, 162, 184, 0.25);
        }

        .bg-danger.img-card:hover {
            box-shadow: 0 4px 25px 0 rgba(220, 53, 69, 0.25);
        }

        .bg-purple.img-card:hover {
            box-shadow: 0 4px 25px 0 rgba(111, 66, 193, 0.25);
        }

        .bg-warning.img-card:hover {
            box-shadow: 0 4px 25px 0 rgba(255, 193, 7, 0.25);
        }
    </style>
@endsection
