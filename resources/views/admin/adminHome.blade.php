@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Selamat Datang Admin</h3>
            <h6 class="op-7 mb-2">Website Perpustakaan Nusantara</h6>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('rak.index') }}" class="btn btn-label-info btn-round me-2">Atur Rak</a>
            <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-round">Tambah Anggota</a>
        </div>
    </div>
    <div class="row">
        <!-- Card Pengunjung -->
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="bi bi-person"></i> <!-- Bootstrap Icons untuk Pengunjung -->
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                            <p class="card-category">Cabang Perpustakaan</p>
                            <h4 class="card-title" id="total-cabang">Loading...</h4> <!-- Angka cabang yang akan diperbarui -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
    // Fungsi untuk mendapatkan total cabang perpustakaan secara live
    function fetchTotalCabang() {
        fetch("{{ route('api.total-cabang') }}")
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-cabang').textContent = data.total_cabang;
            })
            .catch(error => console.error('Error fetching total cabang:', error));
    }

    // Panggil fungsi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        fetchTotalCabang();
        
        // Perbarui setiap 5 detik (5000 ms)
        setInterval(fetchTotalCabang, 5000);
    });
</script>

        <!-- Card Berlangganan -->
        <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-icon">
                    <div class="icon-big text-center icon-info bubble-shadow-small">
                        <i class="bi bi-check-circle"></i> <!-- Bootstrap Icons untuk Berlangganan -->
                    </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                    <div class="numbers">
                        <p class="card-category">Anggota</p>
                        <h4 class="card-title" id="total-anggota">Loading...</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mendapatkan total anggota secara live
    function fetchTotalAnggota() {
        fetch("{{ route('api.total-anggota') }}")
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-anggota').textContent = data.total_anggota;
            })
            .catch(error => console.error('Error fetching total anggota:', error));
    }

    // Panggil fungsi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        fetchTotalAnggota();
        
        // Perbarui setiap 5 detik (5000 ms)
        setInterval(fetchTotalAnggota, 5000);
    });
</script>



        <!-- Card Total Buku -->
        <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-icon">
                    <div class="icon-big text-center icon-success bubble-shadow-small">
                        <i class="bi bi-book"></i> <!-- Bootstrap Icons untuk Total Buku -->
                    </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                    <div class="numbers">
                        <p class="card-category">Total Buku</p>
                        <h4 class="card-title" id="total-buku">Loading...</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mendapatkan total buku secara live
    function fetchTotalBuku() {
        fetch("{{ route('api.total-buku') }}")
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-buku').textContent = data.total_buku + ' Buku';
            })
            .catch(error => console.error('Error fetching total buku:', error));
    }

    // Panggil fungsi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        fetchTotalBuku();
        
        // Perbarui setiap 5 detik (5000 ms)
        setInterval(fetchTotalBuku, 5000);
    });
</script>


    <div class="row">
        <div class="row">
            <!-- Card Statistik Pengguna -->
            <div class="col-md-8">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Statistik Pengguna</div>
                            <div class="card-tools">
                                <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                    <span class="btn-label"><i class="fa fa-pencil"></i></span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-label-info btn-round btn-sm">
                                    <span class="btn-label"><i class="fa fa-print"></i></span>
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height: 100%; width: 100%;">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>

            <!-- Card Statistik Transaksi Buku -->
            <div class="col-md-4">
                <div class="card card-primary card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Statistik Transaksi Buku</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-secondary btn-sm dropdown-toggle"
                                        type="button"
                                        id="dropdownMenuButton"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Opsi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Export</a>
                                        <a class="dropdown-item" href="#">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-category">Data Harian (Jan - Des)</div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="mb-4 mt-2">
                            <h1>1,245 Buku</h1>
                        </div>
                        <div class="pull-in">
                            <canvas id="dailySalesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Statistik Pengguna (Chart Bulanan)
            const statisticsCtx = document.getElementById('statisticsChart').getContext('2d');
            const statisticsData = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Pengguna Aktif',
                    data: [120, 150, 170, 200, 240, 260, 300, 320, 350, 380, 400, 450],
                    borderColor: '#4caf50',
                    backgroundColor: 'rgba(76, 175, 80, 0.2)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#4caf50',
                    pointBorderColor: '#fff',
                }, ],
            };

            const statisticsOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan',
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Pengguna',
                        },
                        beginAtZero: true,
                    },
                },
            };

            new Chart(statisticsCtx, {
                type: 'line',
                data: statisticsData,
                options: statisticsOptions,
            });

            // Statistik Transaksi Buku (Chart Harian)
            const dailySalesCtx = document.getElementById('dailySalesChart').getContext('2d');
            const dailySalesData = {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Buku Terpinjam',
                    data: [15, 20, 25, 30, 35, 40, 45],
                    borderColor: '#2196f3',
                    backgroundColor: 'rgba(33, 150, 243, 0.2)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#2196f3',
                    pointBorderColor: '#fff',
                    // Ubah warna label di legend
                    borderColor: '#2196f3',
                    pointBorderColor: '#ffffff',
                    pointBackgroundColor: '#ffffff',
                    color: '#ffffff', // Warna teks "Buku Terpinjam" di legend
                }, ],
            };

            const dailySalesOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Hari',
                            color: '#ffffff', // Ubah warna teks menjadi putih
                        },
                        ticks: {
                            color: '#ffffff', // Ubah warna teks ticks menjadi putih
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Buku',
                            color: '#ffffff', // Ubah warna teks menjadi putih
                        },
                        ticks: {
                            color: '#ffffff', // Ubah warna teks ticks menjadi putih
                        },
                        beginAtZero: true,
                    },
                },
            };


            new Chart(dailySalesCtx, {
                type: 'line',
                data: dailySalesData,
                options: dailySalesOptions,
            });
        </script>
        <!-- Card User Online -->
        <div class="card card-round">
            <div class="card-body pb-0">
                <div class="h1 fw-bold float-end text-primary">+10%</div>
                <h2 class="mb-2">60</h2>
                <p class="text-muted">Pengguna Online</p>
                <div class="pull-in sparkline-fix">
                    <div id="lineChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Card User Online -->

<div class="row">
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <h4 class="card-title">Users Geolocation</h4>
                </div>
                <p class="card-category">
                    Map of the distribution of users across Indonesian cities
                </p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive table-hover table-sales">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kota</th>
                                        <th class="text-end">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody id="locationTable">
                                    <!-- Data lokasi akan diisi secara dinamis -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mapcontainer">
                            <div id="map" class="w-100" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection