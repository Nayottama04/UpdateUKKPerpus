@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Transaksi</h4>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm float-right">Tambah Transaksi</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Anggota</th>
          <th>Pustaka</th>
          <th>Tgl Pinjam</th>
          <th>Tgl Kembali</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($transaksi as $t)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $t->anggota->nama_anggota }}</td>
          <td>{{ $t->pustaka->judul_pustaka }}</td>
          <td>{{ $t->tgl_pinjam }}</td>
          <td>{{ $t->tgl_kembali }}</td>
          <td>
            <a href="{{ route('transaksi.edit', $t->id_transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('transaksi.destroy', $t->id_transaksi) }}" method="POST" style="display:inline;">
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
