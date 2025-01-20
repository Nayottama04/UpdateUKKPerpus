@extends('layouts.admin')

@section('title', 'Detail Format Buku')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Format Buku</h4>
    <a href="{{ route('format.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Kode Format</th>
        <td>{{ $format->kode_format }}</td>
      </tr>
      <tr>
        <th>Nama Format</th>
        <td>{{ $format->format }}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{{ $format->keterangan ?? 'Tidak ada' }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
