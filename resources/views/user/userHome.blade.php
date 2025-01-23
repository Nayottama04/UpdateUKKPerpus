@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Ucapan Selamat Datang -->
            <div class="welcome-image">
                <div class="welcome-overlay"></div>
                <div class="welcome-text">
                    <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
                    <p>
                        Terima kasih telah bergabung di Perpustakaan Nusantara. Nikmati berbagai koleksi pustaka kami, cek riwayat transaksi Anda, dan temukan buku yang tersedia untuk dipinjam.
                    </p>
                </div>
            </div>
        </div>
    </div>

<style>
    /* Gambar Latar Belakang */
    .welcome-image {
        position: relative;
        background-image: url('https://wallpapercave.com/wp/wp10055128.jpg'); /* Ganti dengan gambar latar belakang */
        background-size: cover;
        background-position: center;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 18px;
    }

    /* Overlay Gelap untuk Membantu Membaca Teks */
    .welcome-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4); /* Gelap dengan transparansi */
        border-radius: 18px;
    }

    .welcome-text {
        text-align: center;
        color: #fff;
        font-family: 'San Francisco', sans-serif;
        font-size: 1.2rem;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        padding: 0 20px;
        z-index: 1;
    }

    .welcome-text h2 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .welcome-text p {
        font-size: 1rem;
    }

    /* Efek untuk responsif di mobile */
    @media (max-width: 767px) {
        .welcome-image {
            height: 300px;
        }

        .welcome-text h2 {
            font-size: 1.5rem;
        }

        .welcome-text p {
            font-size: 0.9rem;
        }
    }
</style>
<br>
    <!-- Statistik -->
    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card shadow-lg hover-effect" style="border-radius: 18px; background-color: #f2f2f2;">
                <div class="card-body">
                    <h5>Total Pustaka</h5>
                    <h2 style="font-size: 2.5rem; font-weight: bold; color: #1e1e1e;">{{ $totalPustaka }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg hover-effect" style="border-radius: 18px; background-color: #f2f2f2;">
                <div class="card-body">
                    <h5>Riwayat Transaksi</h5>
                    <h2 style="font-size: 2.5rem; font-weight: bold; color: #1e1e1e;">{{ $totalTransaksi }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg hover-effect" style="border-radius: 18px; background-color: #f2f2f2;">
                <div class="card-body">
                    <h5>Buku Tersedia</h5>
                    <h2 style="font-size: 2.5rem; font-weight: bold; color: #1e1e1e;">{{ $bukuTersedia }}</h2>
                </div>
            </div>
        </div>
    </div>

<!-- Buku Terbaru -->
<div class="row">
    <div class="col-md-12">
        <h4 class="mb-3" style="font-size: 1.75rem; color: #333; font-weight: bold;">Buku Terbaru</h4>
        <div class="row">
            @foreach ($pustakaBaru as $pustaka)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg hover-effect" style="border-radius: 18px; overflow: hidden; background-color: #fff;">
                        <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="{{ $pustaka->judul_pustaka }}" 
                             class="card-img-top" style="height: 220px; object-fit: cover; border-radius: 18px 18px 0 0;">
                        <div class="card-body" style="padding: 20px;">
                            <h5 class="card-title" style="color: #333; font-size: 1.3rem;">{{ $pustaka->judul_pustaka }}</h5>
                            <p class="card-text text-muted" style="font-size: 1rem; margin-bottom: 10px;">Pengarang: {{ $pustaka->pengarang->nama_pengarang }}</p>
                            <a href="{{ route('pustaka.show', $pustaka->id) }}" 
                               class="btn btn-outline-dark btn-sm" 
                               style="border-radius: 20px; border: 2px solid #333; color: #333;">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<style>
    body {
        background-color: #f9f9f9;
        font-family: 'San Francisco', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .card {
        border: none;
    }

    .card-header {
        font-size: 1.5rem;
        font-weight: bold;
    }

    h4 {
        font-size: 1.75rem;
        font-weight: bold;
        margin-bottom: 16px;
    }

    .btn-outline-dark {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-outline-dark:hover {
        background-color: #333;
        color: #fff;
    }

    /* Efek Hover untuk Card */
    .hover-effect {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-effect:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
