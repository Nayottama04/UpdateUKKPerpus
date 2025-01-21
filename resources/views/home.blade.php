@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); background-color: #fff;">
                <div class="card-header" style="background-color: #333; color: #fff; border-radius: 8px 8px 0 0; text-align: center; padding: 16px;">
                    <h3>{{ __('Dashboard') }}</h3>
                </div>

                <div class="card-body" style="padding: 32px; font-family: 'Arial', sans-serif;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="background-color: #28a745; color: white; border-radius: 4px; padding: 10px; margin-bottom: 20px;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Statistik -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="card shadow-sm" style="border-radius: 8px; margin-bottom: 20px;">
                                <div class="card-body">
                                    <h5>Total Pustaka</h5>
                                    <h3>{{ $totalPustaka }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm" style="border-radius: 8px; margin-bottom: 20px;">
                                <div class="card-body">
                                    <h5>Riwayat Transaksi</h5>
                                    <h3>{{ $totalTransaksi }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm" style="border-radius: 8px; margin-bottom: 20px;">
                                <div class="card-body">
                                    <h5>Buku Tersedia</h5>
                                    <h3>{{ $bukuTersedia }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Buku Baru -->
                    <div class="mt-4">
                        <h4 class="mb-3" style="color: #333;">Buku Terbaru</h4>
                        <div class="row">
                            @foreach ($pustakaBaru as $pustaka)
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm h-100" style="border-radius: 8px;">
                                    <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="{{ $pustaka->judul_pustaka }}" class="card-img-top" style="border-radius: 8px 8px 0 0;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $pustaka->judul_pustaka }}</h5>
                                        <p class="card-text text-muted">Pengarang: {{ $pustaka->pengarang->nama_pengarang }}</p>
                                    

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f4f7fa;
        font-family: 'Roboto', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #333;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 16px;
        text-align: center;
    }

    .card-body {
        padding: 32px;
    }

    h2 {
        font-size: 2rem;
        font-weight: 600;
        color: #333;
    }

    .alert {
        padding: 12px;
        background-color: #28a745;
        color: white;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>

@endsection
