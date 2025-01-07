@extends('layouts.admin')

@section('title', 'Jenis Anggota')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Jenis Anggota</h4>
    <a href="{{ route('jenis-anggota.create') }}" class="btn btn-primary btn-sm float-right">Tambah Jenis Anggota</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Jenis</th>
          <th>Nama Jenis</th>
          <th>Maks Pinjam</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jenisAnggota as $j)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $j->kode_jenis_anggota }}</td>
          <td>{{ $j->jenis_anggota }}</td>
          <td>{{ $j->max_pinjam }}</td>
          <td>{{ $j->keterangan }}</td>
          <td>
            <a href="{{ route('jenis-anggota.edit', $j->id_jenis_anggota) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('jenis-anggota.destroy', $j->id_jenis_anggota) }}" method="POST" style="display:inline;">
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
