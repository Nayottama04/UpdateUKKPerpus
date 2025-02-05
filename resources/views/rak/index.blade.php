@extends('layouts.admin')

@section('title', 'rak')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Rak</h4>
    <a href="{{ route('rak.create') }}" class="btn btn-primary btn-sm float-right">Tambah Rak</a>
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
          <th>Kode Rak</th>
          <th>Nama Rak</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rak as $r)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $r->kode_rak }}</td>
          <td>{{ $r->rak }}</td>
          <td>{{ $r->keterangan }}</td>
          <td>
            <a href="{{ route('rak.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('rak.destroy', $r->id) }}" method="POST" style="display:inline;">
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