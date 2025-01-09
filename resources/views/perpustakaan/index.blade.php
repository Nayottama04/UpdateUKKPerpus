@extends('layouts.admin')

@section('title', 'Perpustakaan')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Perpustakaan</h4>
    <a href="{{ route('perpustakaan.create') }}" class="btn btn-primary btn-sm float-right">Tambah Perpustakaan</a>
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
          <th>Nama Perpustakaan</th>
          <th>Nama Pustakawan</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($perpustakaan as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->nama_perpustakaan }}</td>
          <td>{{ $p->nama_pustakawan }}</td>
          <td>{{ $p->email }}</td>
          <td>{{ $p->alamat }}</td>
          <td>
            <a href="{{ route('perpustakaan.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('perpustakaan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('perpustakaan.destroy', $p->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus perpustakaan ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center">Tidak ada data perpustakaan.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection