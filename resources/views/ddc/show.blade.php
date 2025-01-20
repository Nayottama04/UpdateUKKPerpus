@extends('layouts.admin')

@section('title', 'Detail DDC')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail DDC</h4>
    <a href="{{ route('ddc.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Kode DDC</th>
        <td>{{ $ddc->kode_ddc }}</td>
      </tr>
      <tr>
        <th>DDC</th>
        <td>{{ $ddc->ddc }}</td>
      </tr>
      <tr>
        <th>Rak</th>
        <td>{{ $ddc->rak->rak }}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{{ $ddc->keterangan }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
