@extends('layouts.admin')

@section('title', 'Detail Perpustakaan')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Perpustakaan</h4>
    <a href="{{ route('perpustakaan.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Nama Perpustakaan</th>
        <td>{{ $perpustakaan->nama_perpustakaan }}</td>
      </tr>
      <tr>
        <th>Nama Pustakawan</th>
        <td>{{ $perpustakaan->nama_pustakawan }}</td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td>{{ $perpustakaan->alamat }}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{ $perpustakaan->email }}</td>
      </tr>
      <tr>
        <th>No. Telepon</th>
        <td>{{ $perpustakaan->no_telp }}</td>
      </tr>
      <tr>
        <th>Website</th>
        <td>{{ $perpustakaan->website ?? 'Tidak ada' }}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{{ $perpustakaan->keterangan ?? 'Tidak ada' }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
