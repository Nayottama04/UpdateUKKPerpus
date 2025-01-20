@extends('layouts.admin')

@section('title', 'Daftar Anggota')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Anggota</h4>
    <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-sm float-right">Tambah Anggota</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Anggota</th>
          <th>Nama Anggota</th>
          <th>Jenis Anggota</th>
          <th>Alamat</th>
          <th>No. Telepon</th>
          <th>Email</th>
          <th>Aktif?</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($anggota as $a)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $a->kode_anggota }}</td>
          <td>{{ $a->nama_anggota }}</td>
          <td>{{ $a->jns_anggota }}</td>
          <td>{{ $a->alamat }}</td>
          <td>{{ $a->no_telp }}</td>
          <td>{{ $a->email }}</td>
          <td>{{ $a->fa == 'Y' ? 'Ya' : 'Tidak' }}</td>
          <td>
            <a href="{{ route('anggota.show', $a->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('anggota.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" style="display:inline;">
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