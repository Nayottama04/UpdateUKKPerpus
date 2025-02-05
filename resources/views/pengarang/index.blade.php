@extends('layouts.admin')

@section('title', 'Daftar Pengarang')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Pengarang</h4>
    <a href="{{ route('pengarang.create') }}" class="btn btn-primary btn-sm float-right">Tambah Pengarang</a>
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
          <th>Kode Pengarang</th>
          <th>Nama Pengarang</th>
          <th>No. Telepon</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pengarang as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->kode_pengarang }}</td>
          <td>{{ $p->nama_pengarang }}</td>
          <td>{{ $p->no_telp }}</td>
          <td>{{ $p->email }}</td>
          <td>
            <a href="{{ route('pengarang.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('pengarang.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('pengarang.destroy', $p->id) }}" method="POST" style="display:inline;">
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
