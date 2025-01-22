<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perpustakaan') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .navbar {
            background-color: #f5f5f7;
            padding: 5px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
        }

        .navbar-brand:hover {
            text-decoration: none;
            color: #555;
        }

        .nav-link {
            color: #555;
            font-size: 1rem;
            margin-right: 15px;
            text-transform: capitalize;
        }

        .nav-link:hover {
            color: #333;
        }

        .nav-item .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .nav-item .dropdown-item {
            color: #333;
            padding: 10px 20px;
        }

        .nav-item .dropdown-item:hover {
            background-color: #e9ecef;
        }

        .btn-outline-light {
            border: 1px solid #555;
            color: #555;
            border-radius: 8px;
        }

        .btn-outline-light:hover {
            background-color: #333;
            color: #fff;
        }

        footer {
            background-color: #f5f5f7;
            padding: 10px 0;
            text-align: center;
            border-top: 1px solid #ddd;
            font-size: 0.9rem;
            color: #555;
        }

        footer a {
            color: #555;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        main {
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Perpustakaan
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
    
                        @auth
                            @if (Auth::user()->is_admin)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="bookMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Buku
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="bookMenu">
                                        <li><a class="dropdown-item" href="{{ route('books.index') }}">Daftar Buku</a></li>
                                        <li><a class="dropdown-item" href="{{ route('books.create') }}">Tambah Buku</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <p>&copy; {{ date('Y') }} Perpustakaan. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
