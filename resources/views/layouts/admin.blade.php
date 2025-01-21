<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Admin Dashboard</title>
  <meta
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    name="viewport" />
  <link
    rel="icon"
    href="{{ asset('img/kaiadmin/favicon.ico') }}"
    type="image/x-icon" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <!-- Fonts and icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
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
      active: function() {
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
              height="20" />
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
                href="{{ route('admin.home') }}"
                class="collapsed"
                aria-expanded="false">
                <i class="fas fa-home"></i>
                <p>Dashboard Admin
                </p>

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
                height="20" />
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
          class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
          <div class="container-fluid">
            <nav
              class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
              <div class="input-group">
                <div class="input-group-prepend">
                  <button type="submit" class="btn btn-search pe-1">
                    <i class="fa fa-search search-icon"></i>
                  </button>
                </div>
                <input
                  type="text"
                  placeholder="Cari..."
                  class="form-control" />
              </div>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
              <li
                class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
              </li>
              <li class="nav-item topbar-icon dropdown hidden-caret">
              </li>

              <li class="nav-item topbar-user dropdown hidden-caret">
                <a
                  class="dropdown-toggle profile-pic"
                  data-bs-toggle="dropdown"
                  href="#"
                  aria-expanded="false">
                  <div class="avatar-sm">
                    <img
                      src="{{ asset('img/profile.jpg') }}"
                      alt="..."
                      class="avatar-img rounded-circle" />
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
                            class="avatar-img rounded" />
                        </div>
                        <div class="u-text">
                          <h4>Aing Admin</h4>
                          <p class="text-muted">GuehAdmin@gmail.com</p>
                          <a
                            href="profile.html"
                            class="btn btn-xs btn-secondary btn-sm">Lihat Profil</a>
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

        @yield('content')

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
            border-radius: 15px;
            /* Menambahkan sudut melengkung pada peta */
            overflow: hidden;
            /* Menghindari konten meluap keluar dari sudut yang melengkung */
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