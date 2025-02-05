@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center" style="font-weight: bold;">Riwayat Peminjaman</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->pustaka->judul_pustaka }}</td>
                    <td>{{ date('d-m-Y', strtotime($transaksi->tgl_pinjam)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($transaksi->tgl_kembali)) }}</td>
                    <td>
                        @if($transaksi->tgl_pengembalian)
                            <span class="badge bg-success">Dikembalikan</span>
                        @else
                            @php
                                $hariTelat = max(0, now()->diffInDays($transaksi->tgl_pengembalian, false)); 
                                $totalDenda = $hariTelat * $transaksi->pustaka->denda_terlambat;
                            @endphp

                            @if($hariTelat > 0)
                                
                                <p class="text-danger">Denda: Rp {{ number_format($totalDenda, 0, ',', '.') }}</p>
                            @else
                                <span class="badge bg-warning">Dipinjam</span>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(!$transaksi->tgl_pengembalian)
                            @if($hariTelat > 0)
                                <!-- Jika ada denda, user harus bayar dulu -->
                                <a href="{{ route('user.pembayaran.index', $transaksi->id) }}" class="btn btn-sm btn-warning">
                                    Bayar Denda
                                </a>
                            @else
                                <!-- Jika tidak ada denda, bisa langsung dikembalikan -->
                                <form action="{{ route('user.kembalikan', $transaksi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-primary" style="border-radius: 8px;">
                                        Kembalikan Buku
                                    </button>
                                </form>
                            @endif
                        @else
                            <span class="text-success">Buku telah dikembalikan</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    body {
        background-color: #f5f5f7;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .table th, .table td {
        vertical-align: middle;
    }
</style>
@endsection
