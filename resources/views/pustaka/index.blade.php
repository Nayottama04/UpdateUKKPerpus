@extends('layouts.admin')

@section('title', 'Daftar Pustaka')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Daftar Pustaka</h4>
    <a href="{{ route('pustaka.create') }}" class="btn btn-primary btn-sm float-right">Tambah Pustaka</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Pustaka</th>
          <th>Judul Pustaka</th>
          <th>DDC</th>
          <th>Format</th>
          <th>Penerbit</th>
          <th>Pengarang</th>
          <th>Harga Buku</th>
          <th>Kondisi Buku</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pustakas as $pustaka)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pustaka->kode_pustaka }}</td>
          <td>{{ $pustaka->judul_pustaka }}</td>
          <td>{{ $pustaka->ddc->ddc }}</td>
          <td>{{ $pustaka->format->format }}</td>
          <td>{{ $pustaka->penerbit->nama_penerbit }}</td>
          <td>{{ $pustaka->pengarang->nama_pengarang }}</td>
          <td>{{ $pustaka->harga_buku }}</td>
          <td>{{ $pustaka->kondisi_buku }}</td>
          <td>
            <a href="{{ route('pustaka.show', $pustaka->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('pustaka.edit', $pustaka->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('pustaka.destroy', $pustaka->id) }}" method="POST" style="display:inline;">
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
