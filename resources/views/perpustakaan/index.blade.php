@extends('layouts.admin')

@section('title', 'Perpustakaan')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Perpustakaan</h4>
    <a href="{{ route('perpustakaan.create') }}" class="btn btn-primary btn-sm float-right">Tambah Perpustakaan</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($perpustakaan as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->nama_perpustakaan }}</td>
          <td>{{ $p->email }}</td>
          <td>{{ $p->alamat }}</td>
          <td>
            <a href="{{ route('perpustakaan.edit', $p->id_perpustakaan) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('perpustakaan.destroy', $p->id_perpustakaan) }}" method="POST" style="display:inline;">
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
