@extends('layouts.admin')

@section('title', 'Pustaka')

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
          <th>ISBN</th>
          <th>Judul</th>
          <th>Tahun Terbit</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pustaka as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->isbn }}</td>
          <td>{{ $p->judul_pustaka }}</td>
          <td>{{ $p->tahun_terbit }}</td>
          <td>{{ $p->harga_buku }}</td>
          <td>
            <a href="{{ route('pustaka.edit', $p->id_pustaka) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('pustaka.destroy', $p->id_pustaka) }}" method="POST" style="display:inline;">
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
