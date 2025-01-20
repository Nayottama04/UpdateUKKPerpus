@extends('layouts.admin')

@section('title', 'Detail Pustaka')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Pustaka</h4>
    <a href="{{ route('pustaka.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Kode Pustaka</th>
        <td>{{ $pustaka->kode_pustaka }}</td>
      </tr>
      <tr>
        <th>Judul Pustaka</th>
        <td>{{ $pustaka->judul_pustaka }}</td>
      </tr>
      <tr>
        <th>DDC</th>
        <td>{{ $pustaka->ddc->ddc }}</td>
      </tr>
      <tr>
        <th>Format</th>
        <td>{{ $pustaka->format->format }}</td>
      </tr>
      <tr>
        <th>Penerbit</th>
        <td>{{ $pustaka->penerbit->nama_penerbit }}</td>
      </tr>
      <tr>
        <th>Pengarang</th>
        <td>{{ $pustaka->pengarang->nama_pengarang }}</td>
      </tr>
      <tr>
        <th>Harga Buku</th>
        <td>{{ $pustaka->harga_buku }}</td>
      </tr>
      <tr>
        <th>Kondisi Buku</th>
        <td>{{ $pustaka->kondisi_buku }}</td>
      </tr>
      <tr>
        <th>Gambar</th>
        <td>
          @if($pustaka->gambar)
          <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Gambar Pustaka" class="img-thumbnail" width="150">
          @else
          Tidak ada gambar
          @endif
        </td>
      </tr>
    </table>
  </div>
</div>
@endsection
