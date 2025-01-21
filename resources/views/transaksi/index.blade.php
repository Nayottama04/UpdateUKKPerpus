@extends('layouts.admin')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Transaksi</h4>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm float-right">Tambah Transaksi</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Pustaka</th>
          <th>Anggota</th>
          <th>Tgl Pinjam</th>
          <th>Tgl Kembali</th>
          <th>Tgl Pengembalian</th>
          <th>FP</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($transaksis as $transaksi)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $transaksi->pustaka->judul_pustaka }}</td>
          <td>{{ $transaksi->anggota->nama_anggota }}</td>
          <td>{{ $transaksi->tgl_pinjam }}</td>
          <td>{{ $transaksi->tgl_kembali }}</td>
          <td>{{ $transaksi->tgl_pengembalian ?? 'Belum Dikembalikan' }}</td>
          <td>{{ $transaksi->fp == '1' ? 'Ya' : 'Tidak' }}</td>
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
