@extends('layouts.admin')

@section('title', 'Detail Transaksi')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Transaksi</h4>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Pustaka</th>
        <td>{{ $transaksi->pustaka->judul_pustaka }}</td>
      </tr>
      <tr>
        <th>Anggota</th>
        <td>{{ $transaksi->anggota->nama_anggota }}</td>
      </tr>
      <tr>
        <th>Tanggal Pinjam</th>
        <td>{{ $transaksi->tgl_pinjam }}</td>
      </tr>
      <tr>
        <th>Tanggal Kembali</th>
        <td>{{ $transaksi->tgl_kembali }}</td>
      </tr>
      <tr>
        <th>Tanggal Pengembalian</th>
        <td>{{ $transaksi->tgl_pengembalian ?? 'Belum Dikembalikan' }}</td>
      </tr>
      <tr>
        <th>FP</th>
        <td>{{ $transaksi->fp == '1' ? 'Ya' : 'Tidak' }}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{{ $transaksi->keterangan }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
