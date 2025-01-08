<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{ asset('img/kaiadmin/favicon.ico') }}"
      type="image/x-icon"
    />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    

    <!-- Fonts and icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: [
            "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css",
            "{{ asset('css/fonts.min.css') }}"
          ],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    
    
</head>

  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="admin.blade.php" class="logo">
              <img
                src="{{ asset('img/kaiadmin/logo_light.svg') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Halaman Utama</p>
                  <span class="caret"></span>
                </a>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Halaman Menu</h4>
              </li>
              <ul class="nav nav-secondary">
  <!-- Perpustakaan -->
  <li class="nav-item">
    <a href="{{ route('perpustakaan.index') }}">
      <i class="fas fa-book"></i>
      <p>Perpustakaan</p>
    </a>
  </li>

  <!-- Rak -->
  <li class="nav-item">
    <a href="{{ route('rak.index') }}">
    <i class="fas fa-list-alt"></i>
      <p>Rak</p>
    </a>
  </li>

  <!-- DDC -->
  <li class="nav-item">
    <a href="{{ route('ddc.index') }}">
      <i class="fas fa-list-alt"></i>
      <p>DDC</p>
    </a>
  </li>

  <!-- Format Buku -->
  <li class="nav-item">
    <a href="{{ route('format.index') }}">
      <i class="fas fa-file"></i>
      <p>Format Buku</p>
    </a>
  </li>

  <!-- Jenis Anggota -->
  <li class="nav-item">
    <a href="{{ route('jenis-anggota.index') }}">
      <i class="fas fa-users"></i>
      <p>Jenis Anggota</p>
    </a>
  </li>

  <!-- Anggota -->
  <li class="nav-item">
    <a href="{{ route('anggota.index') }}">
      <i class="fas fa-user"></i>
      <p>Anggota</p>
    </a>
  </li>

  <!-- Penerbit -->
  <li class="nav-item">
    <a href="{{ route('penerbit.index') }}">
      <i class="fas fa-building"></i>
      <p>Penerbit</p>
    </a>
  </li>

  <!-- Pengarang -->
  <li class="nav-item">
    <a href="{{ route('pengarang.index') }}">
      <i class="fas fa-pen"></i>
      <p>Pengarang</p>
    </a>
  </li>

  <!-- Pustaka -->
  <li class="nav-item">
    <a href="{{ route('pustaka.index') }}">
      <i class="fas fa-book-reader"></i>
      <p>Pustaka</p>
    </a>
  </li>

  <!-- Transaksi -->
  <li class="nav-item">
    <a href="{{ route('transaksi.index') }}">
      <i class="fas fa-exchange-alt"></i>
      <p>Transaksi</p>
    </a>
  </li>
</ul>

          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="{{ asset('img/kaiadmin/logo_light.svg') }}"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                </li>
               
                        
                  
                
                
      
                <li class="nav-item topbar-icon dropdown hidden-caret">
                </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="{{ asset('img/profile.jpg') }}"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="fw-bold">Admin</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="{{ asset('img/profile.jpg') }}"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>Aing Admin</h4>
                            <p class="text-muted">admin@itsolution.com</p>
                            <a
                              href="profile.html"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Selamat Datang Admin</h3>
                <h6 class="op-7 mb-2">Website Perpustakaan Nusantara</h6> 
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Atur Buku</a>
                <a href="#" class="btn btn-primary btn-round">Tambahkan Buku</a>
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
              <p class="card-category">Pengunjung</p>
              <h4 class="card-title">360</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
              <p class="card-category">Berlangganan</p>
              <h4 class="card-title">175</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
              <h4 class="card-title">540 Buku</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
                aria-expanded="false"
              >
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
    datasets: [
      {
        label: 'Pengguna Aktif',
        data: [120, 150, 170, 200, 240, 260, 300, 320, 350, 380, 400, 450],
        borderColor: '#4caf50',
        backgroundColor: 'rgba(76, 175, 80, 0.2)',
        tension: 0.4,
        fill: true,
        pointBackgroundColor: '#4caf50',
        pointBorderColor: '#fff',
      },
    ],
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
  datasets: [
    {
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
    },
  ],
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
        color: '#ffffff',  // Ubah warna teks menjadi putih
      },
      ticks: {
        color: '#ffffff',  // Ubah warna teks ticks menjadi putih
      },
    },
    y: {
      title: {
        display: true,
        text: 'Jumlah Buku',
        color: '#ffffff',  // Ubah warna teks menjadi putih
      },
      ticks: {
        color: '#ffffff',  // Ubah warna teks ticks menjadi putih
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

<!-- Leaflet.js -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

<!-- JavaScript untuk Geolocation -->
<script>
  // Data simulasi jumlah pengguna per kota
  const cityData = {
    Jakarta: 320,
    Surabaya: 250,
    Bandung: 180,
    Medan: 140,
    Semarang: 120,
    Yogyakarta: 90,
    Malang: 70,
    Bali: 50,
  };

  // Menambahkan data kota ke tabel
  function updateLocationTable(data) {
    const tableBody = document.getElementById('locationTable');
    tableBody.innerHTML = ''; // Kosongkan tabel
    for (const [city, count] of Object.entries(data)) {
      const row = `
        <tr>
          <td>${city}</td>
          <td class="text-end">${count}</td>
        </tr>
      `;
      tableBody.insertAdjacentHTML('beforeend', row);
    }
  }

  // Membuat peta menggunakan Leaflet.js
  function createMap(data) {
    const map = L.map('map').setView([-2.5489, 118.0149], 5); // Koordinat Indonesia

    // Menambahkan tile layer ke peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors',
    }).addTo(map);

    // Menambahkan marker untuk setiap kota
    const cityCoordinates = {
      Jakarta: [-6.2088, 106.8456],
      Surabaya: [-7.2504, 112.7688],
      Bandung: [-6.9175, 107.6191],
      Medan: [3.5952, 98.6722],
      Semarang: [-6.9667, 110.4167],
      Yogyakarta: [-7.7956, 110.3695],
      Malang: [-7.9666, 112.6326],
      Bali: [-8.3405, 115.0920],
    };

    for (const [city, coords] of Object.entries(cityCoordinates)) {
      const marker = L.marker(coords).addTo(map);
      marker.bindPopup(`<b>${city}</b><br>Jumlah: ${data[city] || 0}`);
    }
  }

  // Inisialisasi fungsi
  document.addEventListener('DOMContentLoaded', () => {
    updateLocationTable(cityData);
    createMap(cityData);
  });
</script>

<!-- CSS untuk peta melengkung -->
<style>
  #map {
    border-radius: 15px; /* Menambahkan sudut melengkung pada peta */
    overflow: hidden;    /* Menghindari konten meluap keluar dari sudut yang melengkung */
  }
</style>




        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              Copyright© 2025,Nayottama
            </div>

          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('js/kaiadmin.min.js') }}"></script>
  </body>
</html>
