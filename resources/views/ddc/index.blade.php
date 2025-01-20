@extends('layouts.admin')

@section('title', 'Daftar DDC')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar DDC</h4>
    <a href="{{ route('ddc.create') }}" class="btn btn-primary btn-sm float-right">Tambah DDC</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode DDC</th>
          <th>DDC</th>
          <th>Rak</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ddcs as $ddc)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $ddc->kode_ddc }}</td>
          <td>{{ $ddc->ddc }}</td>
          <td>{{ $ddc->rak->rak }}</td>
          <td>{{ $ddc->keterangan }}</td>
          <td>
            <a href="{{ route('ddc.show', $ddc->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('ddc.edit', $ddc->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('ddc.destroy', $ddc->id) }}" method="POST" style="display:inline;">
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
