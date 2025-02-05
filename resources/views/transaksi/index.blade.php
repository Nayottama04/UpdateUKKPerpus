@extends('layouts.admin')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Transaksi</h4>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm float-right">Tambah Transaksi</a>
  </div>
  <div class="card-body">
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Pustaka</th>
          <th>Anggota</th>
          <th>Tgl Pinjam</th>
          <th>Tgl Kembali</th>
          <th>Tgl Pengembalian</th>
          <th>Terlambat (Hari)</th>
          <th>Total Denda</th>
          <th>Status Pembayaran</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($transaksis as $transaksi)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $transaksi->pustaka->judul_pustaka }}</td> 
          <td>{{ $transaksi->anggota->nama_anggota }}</td>
          <td>{{ date('d-m-Y', strtotime($transaksi->tgl_pinjam)) }}</td>
          <td>{{ date('d-m-Y', strtotime($transaksi->tgl_kembali)) }}</td>
          <td>{{ $transaksi->tgl_pengembalian ? date('d-m-Y', strtotime($transaksi->tgl_pengembalian)) : 'Belum Dikembalikan' }}</td>
          
          {{-- Hitung keterlambatan & total denda --}}
          @php
            $hariTelat = max(\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($transaksi->tgl_pengembalian)), 0);
            $totalDenda = $hariTelat * $transaksi->pustaka->denda_terlambat;
          @endphp

        
          <td class="text-center">Rp {{ number_format($totalDenda, 0, ',', '.') }}</td>

          {{-- Status Pembayaran --}}
          <td class="text-center">
            @if($transaksi->status_pembayaran == 'lunas')
              <span class="badge bg-success">Lunas</span>
            @else
              <span class="badge bg-danger">Belum Dibayar</span>
            @endif
          </td>

          {{-- Aksi --}}
          <td>
            <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
            
            @if(!$transaksi->tgl_pengembalian && $transaksi->status_pembayaran == 'lunas')
              <form action="{{ route('transaksi.approve', $transaksi->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success btn-sm">Approve Pengembalian</button>
              </form>
            @endif

            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
