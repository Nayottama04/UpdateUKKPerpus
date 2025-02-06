@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Card Gambar Buku -->
        <div class="col-md-4">
            <div class="card shadow-lg" style="border-radius: 16px; overflow: hidden; background-color: #fff; border: none;">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . $pustaka->gambar) }}" 
                         alt="{{ $pustaka->judul_pustaka }}" 
                         class="img-fluid shadow-sm" 
                         style="border-radius: 12px; width: 100%; max-height: 400px; object-fit: cover;">
                </div>
            </div>
        </div>

        <!-- Card Detail Buku -->
        <div class="col-md-7">
            <div class="card shadow-lg" style="border-radius: 16px; background-color: #fff; border: none;">
                <div class="card-header" style="background-color: #333; color: #fff; text-align: center; border-radius: 16px 16px 0 0;">
                    <h3 class="fw-bold mb-0">{{ $pustaka->judul_pustaka }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Pengarang</th>
                            <td>{{ $pustaka->pengarang->nama_pengarang }}</td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>{{ $pustaka->penerbit->nama_penerbit }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Terbit</th>
                            <td>{{ $pustaka->tahun_terbit }}</td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <td>{{ $pustaka->isbn }}</td>
                        </tr>
                        <tr>
                            <th>DDC</th>
                            <td>{{ $pustaka->ddc->ddc }}</td>
                        </tr>
                        <tr>
                            <th>Format</th>
                            <td>{{ $pustaka->format->format }}</td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td>{{ $pustaka->kondisi_buku }}</td>
                        </tr>
                        <tr>
                            <th>Harga Buku</th>
                            <td>Rp {{ number_format($pustaka->harga_buku, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Denda Terlambat</th>
                            <td>Rp {{ number_format($pustaka->denda_terlambat, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Denda Hilang</th>
                            <td>Rp {{ number_format($pustaka->denda_hilang, 0, ',', '.') }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <h4 class="fw-semibold">Abstraksi</h4>
                        <p class="text-muted" style="font-size: 1rem;">{{ $pustaka->abstraksi }}</p>
                    </div>

                    <div class="mt-4 text-center">
    <form action="{{ route('user.peminjaman.store') }}" method="POST">
        @csrf
        <input type="hidden" name="pustaka_id" value="{{ $pustaka->id }}">
        <input type="hidden" name="anggota_id" value="{{ auth()->user()->anggota->id }}">

        <!-- Input Tanggal Pinjam (Locked ke Hari Ini) -->
        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label fw-semibold">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="{{ date('Y-m-d') }}" readonly>
        </div>

        <!-- Input Tanggal Kembali (Otomatis +5 Hari) -->
        <div class="mb-3">
            <label for="tgl_kembali" class="form-label fw-semibold">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" value="{{ date('Y-m-d', strtotime('+5 days')) }}" readonly>
        </div>

        <!-- Pemberitahuan batas waktu peminjaman -->
        <div class="alert alert-warning text-center">
            <strong>Perhatian:</strong> Anda harus mengembalikan buku sebelum <strong>{{ date('d-m-Y', strtotime('+5 days')) }}</strong>.  
            Jika terlambat, akan dikenakan denda.
        </div>

        <button type="submit" class="btn btn-success btn-lg" style="border-radius: 12px; margin-right: 10px;">
            Pinjam Buku
        </button>
    </form>

    <a href="{{ route('home') }}" class="btn btn-dark btn-lg" style="border-radius: 12px;">
        Kembali
    </a>
</div>




                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f5f5f7;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .card {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .fw-bold {
        font-size: 1.8rem;
        font-weight: 700;
    }

    .fw-semibold {
        font-weight: 600;
        color: #333;
    }

    .table th {
        width: 35%;
        color: #555;
    }

    .table td {
        color: #333;
    }
</style>
@endsection
