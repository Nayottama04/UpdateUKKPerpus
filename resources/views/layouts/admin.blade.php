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
          <a href="#" class="logo">
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
                          <p class="text-muted">admin@itsolutionstuff.com</p>
                        </div>
                      </div>
                    </li>
                    <li>
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

        
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
            <div class="copyright">
              Copyright© 2025,Perpustakaan Nasional
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