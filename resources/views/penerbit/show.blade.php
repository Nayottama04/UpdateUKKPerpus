@extends('layouts.admin')

@section('title', 'Detail Penerbit')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Penerbit</h4>
    <a href="{{ route('penerbit.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Kode Penerbit</th>
        <td>{{ $penerbit->kode_penerbit }}</td>
      </tr>
      <tr>
        <th>Nama Penerbit</th>
        <td>{{ $penerbit->nama_penerbit }}</td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td>{{ $penerbit->alamat_penerbit }}</td>
      </tr>
      <tr>
        <th>No. Telepon</th>
        <td>{{ $penerbit->no_telp }}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{ $penerbit->email }}</td>
      </tr>
      <tr>
        <th>Fax</th>
        <td>{{ $penerbit->fax }}</td>
      </tr>
      <tr>
        <th>Website</th>
        <td>{{ $penerbit->website }}</td>
      </tr>
      <tr>
        <th>Kontak</th>
        <td>{{ $penerbit->kontak }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
