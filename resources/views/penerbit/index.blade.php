@extends('layouts.admin')

@section('title', 'Penerbit')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Penerbit</h4>
    <a href="{{ route('penerbit.create') }}" class="btn btn-primary btn-sm float-right">Tambah Penerbit</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Penerbit</th>
          <th>Nama Penerbit</th>
          <th>Email</th>
          <th>No. Telepon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($penerbit as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->kode_penerbit }}</td>
          <td>{{ $p->nama_penerbit }}</td>
          <td>{{ $p->email }}</td>
          <td>{{ $p->no_telp }}</td>
          <td>
            <a href="{{ route('penerbit.edit', $p->id_penerbit) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('penerbit.destroy', $p->id_penerbit) }}" method="POST" style="display:inline;">
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
