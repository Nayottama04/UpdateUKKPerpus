@extends('layouts.admin')

@section('title', 'Pengarang')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Pengarang</h4>
    <a href="{{ route('pengarang.create') }}" class="btn btn-primary btn-sm float-right">Tambah Pengarang</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Pengarang</th>
          <th>Nama Pengarang</th>
          <th>Email</th>
          <th>No. Telepon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pengarang as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->kode_pengarang }}</td>
          <td>{{ $p->nama_pengarang }}</td>
          <td>{{ $p->email }}</td>
          <td>{{ $p->no_telp }}</td>
          <td>
            <a href="{{ route('pengarang.edit', $p->id_pengarang) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('pengarang.destroy', $p->id_pengarang) }}" method="POST" style="display:inline;">
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
