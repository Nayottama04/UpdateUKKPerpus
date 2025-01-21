@extends('layouts.admin')

@section('title', 'Detail Pengarang')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Pengarang</h4>
    <a href="{{ route('pengarang.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Kode Pengarang</th>
        <td>{{ $pengarang->kode_pengarang }}</td>
      </tr>
      <tr>
        <th>Gelar Depan</th>
        <td>{{ $pengarang->gelar_depan ?? 'Tidak Ada' }}</td>
      </tr>
      <tr>
        <th>Nama Pengarang</th>
        <td>{{ $pengarang->nama_pengarang }}</td>
      </tr>
      <tr>
        <th>Gelar Belakang</th>
        <td>{{ $pengarang->gelar_belakang ?? 'Tidak Ada' }}</td>
      </tr>
      <tr>
        <th>No. Telepon</th>
        <td>{{ $pengarang->no_telp }}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{ $pengarang->email }}</td>
      </tr>
      <tr>
        <th>Website</th>
        <td>{{ $pengarang->website ?? 'Tidak Ada' }}</td>
      </tr>
      <tr>
        <th>Biografi</th>
        <td>{{ $pengarang->biografi ?? 'Tidak Ada' }}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{{ $pengarang->keterangan ?? 'Tidak Ada' }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
