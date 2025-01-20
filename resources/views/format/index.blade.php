@extends('layouts.admin')

@section('title', 'Format Buku')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Format Buku</h4>
    <a href="{{ route('format.create') }}" class="btn btn-primary btn-sm float-right">Tambah Format</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Format</th>
          <th>Nama Format</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($format as $f)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $f->kode_format }}</td>
          <td>{{ $f->format }}</td>
          <td>{{ $f->keterangan }}</td>
          <td>
          <a href="{{ route('format.edit', $f->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('format.destroy', $f->id) }}" method="POST" style="display:inline;">
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
