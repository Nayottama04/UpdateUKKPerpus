@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center" style="font-weight: bold;">Pembayaran Denda</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($transaksis->isEmpty())
        <div class="alert alert-info text-center">Tidak ada denda yang harus dibayar.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Kembali</th>
                        <th>Terlambat (Hari)</th>
                        <th>Total Denda</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $transaksi)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->pustaka->judul_pustaka }}</td>
                        <td>{{ date('d-m-Y', strtotime($transaksi->tgl_kembali)) }}</td>
                        <td>{{ $transaksi->hari_telat }}</td>
                        <td>Rp {{ number_format($transaksi->total_denda, 0, ',', '.') }}</td>
                        <td>
                            @if($transaksi->status_pembayaran == 'lunas')
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-danger">Belum Dibayar</span>
                            @endif
                        </td>
                        <td>
                        @if($transaksi->status_pembayaran === 'lunas')
    <button class="btn btn-success btn-sm" disabled>Sudah Lunas</button>
@else
    <form action="{{ route('user.pembayaran.bayar', $transaksi->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">Bayar Sekarang</button>
    </form>
@endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
