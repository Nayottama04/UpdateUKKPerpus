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
        <th>Kondisi Buku</th>  <!-- Tambahan Kondisi Buku -->
        <th>Total Denda</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($transaksis as $transaksi)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $transaksi->pustaka ? $transaksi->pustaka->judul_pustaka : 'No Pustaka' }}</td>
        <td>{{ $transaksi->anggota ? $transaksi->anggota->nama_anggota : 'No Anggota' }}</td>
        <td>{{ date('d-m-Y', strtotime($transaksi->tgl_pinjam)) }}</td>
        <td>{{ date('d-m-Y', strtotime($transaksi->tgl_kembali)) }}</td>
        <td>{{ $transaksi->tgl_pengembalian ? date('d-m-Y', strtotime($transaksi->tgl_pengembalian)) : 'Belum Dikembalikan' }}</td>

        {{-- Menampilkan kondisi buku jika sudah dikembalikan --}}
        <td class="text-center">
    @if($transaksi->kondisi_buku)
        <span class="badge bg-info">{{ ucfirst($transaksi->kondisi_buku) }}</span>
    @else
        <span class="badge bg-danger">Belum Ditentukan</span>
    @endif
</td>


        {{-- Hitung denda berdasarkan kondisi buku --}}
        @php
    $dendaHilang = $transaksi->pustaka ? $transaksi->pustaka->denda_hilang : 0;
    $dendaTerlambat = ($transaksi->tgl_pengembalian) ? max(\Carbon\Carbon::parse($transaksi->tgl_kembali)->diffInDays($transaksi->tgl_pengembalian), 0) * ($transaksi->pustaka->denda_terlambat ?? 0) : 0;
    
    $dendaKondisi = 0;
    if ($transaksi->kondisi_buku == 'Hilang') {
        $dendaKondisi = $dendaHilang;
    } elseif ($transaksi->kondisi_buku == 'Rusak') {
        $dendaKondisi = $dendaHilang / 2;
    }

    $totalDenda = $dendaTerlambat + $dendaKondisi;
@endphp


        <td class="text-center">Rp {{ number_format($totalDenda, 0, ',', '.') }}</td>

        {{-- Aksi --}}
        <td>
            <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>

          

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