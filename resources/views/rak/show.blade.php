@extends('layouts.admin')

@section('title', 'Detail Rak')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Rak</h4>
    <a href="{{ route('rak.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Kode Rak</th>
        <td>{{ $rak->kode_rak }}</td>
      </tr>
      <tr>
        <th>Nama Rak</th>
        <td>{{ $rak->rak }}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{{ $rak->keterangan ?? 'Tidak ada' }}</td>
      </tr>
      <tr>
        <th>Dibuat Pada</th>
        <td>{{ $rak->created_at->format('d M Y') }}</td>
      </tr>
      <tr>
        <th>Diperbarui Pada</th>
        <td>{{ $rak->updated_at->format('d M Y') }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
