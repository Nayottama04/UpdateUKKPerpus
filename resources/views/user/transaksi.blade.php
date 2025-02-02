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
                            <span class="badge bg-warning">Dipinjam</span>
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
