@extends('layouts.admin')

@section('title', 'Daftar Penerbit')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Penerbit</h4>
    <a href="{{ route('penerbit.create') }}" class="btn btn-primary btn-sm float-right">Tambah Penerbit</a>
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
          <th>Kode Penerbit</th>
          <th>Nama Penerbit</th>
          <th>No. Telepon</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($penerbits as $penerbit)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $penerbit->kode_penerbit }}</td>
          <td>{{ $penerbit->nama_penerbit }}</td>
          <td>{{ $penerbit->no_telp }}</td>
          <td>{{ $penerbit->email }}</td>
          <td>
            <a href="{{ route('penerbit.show', $penerbit->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('penerbit.edit', $penerbit->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('penerbit.destroy', $penerbit->id) }}" method="POST" style="display:inline;">
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
