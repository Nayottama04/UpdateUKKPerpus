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
       <!-- Statistik Pengguna Online -->
<div class="col-md-4">
    <div class="card card-round">
        <div class="card-body text-center">
            <h4 class="card-title">Pengguna Online</h4>
            <h1 id="onlineUsers" class="text-success fw-bold">0</h1>
            <p class="text-muted">Pengguna aktif dalam 5 menit terakhir</p>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Statistik Login Mingguan</div>
            </div>
        </div>
        <div class="card-body">
            <canvas id="statisticsChart"></canvas>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function fetchOnlineUsers() {
        fetch("{{ route('admin.onlineUsers') }}")
            .then(response => response.json())
            .then(data => {
                document.getElementById("onlineUsers").innerText = data.onlineUsers;
            })
            .catch(error => console.error('Error fetching online users:', error));
    }

    setInterval(fetchOnlineUsers, 5000); // Update setiap 5 detik

    // Data Statistik Login Mingguan
    function fetchLoginStatistics() {
        fetch("{{ route('admin.loginStatistics') }}")
            .then(response => response.json())
            .then(data => {
                statisticsChart.data.datasets[0].data = Object.values(data);
                statisticsChart.update();
            })
            .catch(error => console.error('Error fetching login statistics:', error));
    }

    const ctx = document.getElementById("statisticsChart").getContext("2d");
    const statisticsChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
            datasets: [{
                label: "Jumlah Login",
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 2,
                data: [0, 0, 0, 0, 0, 0, 0]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    fetchLoginStatistics();
    setInterval(fetchLoginStatistics, 60000); // Update setiap 60 detik
</script>

        <!-- Card User Online -->
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