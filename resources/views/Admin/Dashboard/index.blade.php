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
        <a href="{{ route('barang.view') }}" class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
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
        </a>
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
            <div class="card bg-sapphire img-card box-sapphire-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $completed_requests }}</h2>
                            <p class="text-white mb-0">Request Selesai</p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-check-circle text-white fs-40 me-2 mt-2"></i> </div>
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
    @if (Session::get('user')->role_id == 2 || Session::get('user')->role_id == 3)
        <div class="row mt-4">
            <!-- Donut Chart -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Division Request</h3>
                    </div>
                    <div class="card-body">
                        <div id="donutChart"></div>
                    </div>
                </div>
            </div>
            <!-- Top 5 Barang -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Top 5 Barang yang Sering Direquest Bulan Ini</h3>
                    </div>
                    <div class="card-body">
                        <ul id="topBarangList" class="list-group">
                            <!-- Data akan dimuat melalui JavaScript -->
                        </ul>
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
                                        height: 380,
                                        background: 'transparent',
                                        animations: {
                                            enabled: true,
                                            speed: 500,
                                            animateGradually: {
                                                enabled: true,
                                                delay: 150
                                            },
                                            dynamicAnimation: {
                                                enabled: true,
                                                speed: 350
                                            }
                                        },
                                        dropShadow: {
                                            enabled: true,
                                            color: '#111',
                                            top: -1,
                                            left: 3,
                                            blur: 3,
                                            opacity: 0.2
                                        }
                                    },
                                    title: {
                                        text: new Date().toLocaleString('id-ID', {
                                            month: 'long',
                                            year: 'numeric'
                                        }),
                                        align: 'center',
                                        style: {
                                            fontSize: '24px',
                                            fontWeight: '600',
                                            fontFamily: 'Inter, sans-serif',
                                            color: '#333',
                                            marginBottom: '20px'
                                        },
                                        margin: 20
                                    },
                                    labels: result.data.map(item => item.divisi),
                                    colors: ['#4CAF50', '#2196F3', '#FF9800', '#E91E63', '#9C27B0', '#607D8B',
                                        '#00BCD4'
                                    ],
                                    plotOptions: {
                                        pie: {
                                            donut: {
                                                size: '75%',
                                                background: 'transparent',
                                                labels: {
                                                    show: false
                                                }
                                            },
                                            startAngle: -90,
                                            endAngle: 270
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    fill: {
                                        type: 'gradient',
                                        gradient: {
                                            shade: 'light',
                                            type: "horizontal",
                                            shadeIntensity: 0.25,
                                            gradientToColors: undefined,
                                            inverseColors: true,
                                            opacityFrom: 1,
                                            opacityTo: 0.85,
                                            stops: [50, 0, 100]
                                        }
                                    },
                                    tooltip: {
                                        enabled: true,
                                        theme: 'dark',
                                        style: {
                                            fontSize: '14px',
                                            fontFamily: 'Inter, sans-serif'
                                        },
                                        y: {
                                            formatter: function(val, opts) {
                                                const total = opts.globals.seriesTotals.reduce((a, b) => a + b,
                                                    0);
                                                const percentage = ((val / total) * 100).toFixed(1);
                                                return `${val} request (${percentage}%)`;
                                            }
                                        }
                                    },
                                    legend: {
                                        position: 'bottom',
                                        horizontalAlign: 'center',
                                        floating: false,
                                        fontSize: '14px',
                                        fontFamily: 'Inter, sans-serif',
                                        fontWeight: 500,
                                        formatter: function(label, opts) {
                                            return label + ': ' + opts.w.globals.series[opts.seriesIndex] +
                                                ' request';
                                        },
                                        markers: {
                                            width: 12,
                                            height: 12,
                                            strokeWidth: 0,
                                            strokeColor: '#fff',
                                            radius: 12,
                                            offsetX: -2
                                        },
                                        itemMargin: {
                                            horizontal: 10,
                                            vertical: 5
                                        }
                                    },
                                    responsive: [{
                                        breakpoint: 480,
                                        options: {
                                            chart: {
                                                width: '100%',
                                                height: 300
                                            },
                                            legend: {
                                                position: 'bottom',
                                                fontSize: '12px'
                                            }
                                        }
                                    }],
                                    stroke: {
                                        show: true,
                                        width: 2,
                                        colors: ['#fff']
                                    }
                                };

                                const chart = new ApexCharts(document.querySelector("#donutChart"), options);
                                chart.render();
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
                document.addEventListener('DOMContentLoaded', function() {
                    fetch('/admin/top-five-barang')
                        .then(response => response.json())
                        .then(result => {
                            if (result.success && result.data.length > 0) {
                                const list = document.getElementById('topBarangList');
                                list.innerHTML = ''; // Clear existing content

                                // Add header dengan keterangan bulan
                                const header = document.createElement('div');
                                header.className = 'top-barang-header';
                                header.innerHTML = `
                            <h3>Top 5 Barang - ${new Date().toLocaleString('id-ID', { month: 'long', year: 'numeric' })}</h3>
                            <p>Barang yang paling sering direquest</p>
                        `;
                                list.appendChild(header);

                                // Container untuk items
                                const itemsContainer = document.createElement('div');
                                itemsContainer.className = 'top-barang-container';

                                result.data.forEach((item, index) => {
                                    const listItem = document.createElement('div');
                                    listItem.className = 'top-barang-item';

                                    // Formatting harga to IDR
                                    const formattedHarga = new Intl.NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'IDR',
                                        minimumFractionDigits: 0,
                                        maximumFractionDigits: 0
                                    }).format(item.total_harga);

                                    listItem.innerHTML = `
                                <div class="item-content">
                                    <div class="rank-badge rank-${index + 1}">#${index + 1}</div>
                                    <div class="item-details">
                                        <div class="item-info">
                                            <h4>${item.barang_nama}</h4>
                                            <p> ${item.total_jumlah} pcs</p>
                                            <div class="price">${formattedHarga}</div>
                                        </div>
                                        <div class="progress-bar-container">
                                            <div class="progress-bar progress-${index + 1}" 
                                                style="width: ${getPercentage(item.total_jumlah, result.data[0].total_jumlah)}%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                                    itemsContainer.appendChild(listItem);
                                });

                                list.appendChild(itemsContainer);
                            }
                        })
                        .catch(error => console.error('Error fetching top barang:', error));
                });

                function getPercentage(current, max) {
                    return (current / max * 100).toFixed(1);
                }
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

        .bg-sapphire {
            background: linear-gradient(45deg, #1A237E, #3949AB);
        }

        .box-sapphire-shadow:hover {
            box-shadow: 0 4px 25px 0 rgba(26, 35, 126, 0.25);
        }

        #topBarangList {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px;
        }

        .top-barang-header {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .top-barang-header h3 {
            font-size: 1.5rem;
            margin: 0 0 5px 0;
            font-weight: bold;
        }

        .top-barang-header p {
            margin: 0;
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .top-barang-container {
            padding: 10px;
        }

        .top-barang-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .top-barang-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .item-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .rank-badge {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .rank-1 {
            background: #FFD700;
        }

        .rank-2 {
            background: #C0C0C0;
        }

        .rank-3 {
            background: #CD7F32;
        }

        .rank-4 {
            background: #4CAF50;
        }

        .rank-5 {
            background: #2196F3;
        }

        .item-details {
            flex-grow: 1;
        }

        .item-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .item-info h4 {
            margin: 0;
            font-weight: bold;
            color: #333;
        }

        .item-info p {
            margin: 5px 0;
            color: #666;
        }

        .price {
            font-weight: bold;
            color: #2ecc71;
        }

        .progress-bar-container {
            width: 100%;
            height: 6px;
            background-color: #eee;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            border-radius: 3px;
            transition: width 1s ease-in-out;
        }

        .progress-1 {
            background: #FFD700;
        }

        .progress-2 {
            background: #C0C0C0;
        }

        .progress-3 {
            background: #CD7F32;
        }

        .progress-4 {
            background: #4CAF50;
        }

        .progress-5 {
            background: #2196F3;
        }

        /* Animasi */
        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .top-barang-item {
            animation: slideIn 0.3s ease-out forwards;
        }
    </style>

    <!-- MODAL BARANG LIST -->
    <div class="modal fade" id="modalBarangList" tabindex="-1" role="dialog" aria-labelledby="modalBarangListLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBarangListLabel">Daftar Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="barang-table" class="table table-bordered text-nowrap border-bottom">
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
                                    <th class="border-bottom-0">Stok</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
