@extends('layouts.admin')

@section('title', 'Edit Pustaka')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Pustaka</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('pustaka.update', $pustaka->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="kode_pustaka">Kode Pustaka</label>
        <input type="number" name="kode_pustaka" id="kode_pustaka" class="form-control" value="{{ $pustaka->kode_pustaka }}" required>
      </div>

      <div class="form-group">
        <label for="ddc_id">DDC</label>
        <select name="ddc_id" id="ddc_id" class="form-control" required>
          @foreach($ddcs as $ddc)
          <option value="{{ $ddc->id }}" {{ $ddc->id == $pustaka->ddc_id ? 'selected' : '' }}>{{ $ddc->ddc }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="format_id">Format</label>
        <select name="format_id" id="format_id" class="form-control" required>
          @foreach($formats as $format)
          <option value="{{ $format->id }}" {{ $format->id == $pustaka->format_id ? 'selected' : '' }}>{{ $format->format }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="penerbit_id">Penerbit</label>
        <select name="penerbit_id" id="penerbit_id" class="form-control" required>
          @foreach($penerbits as $penerbit)
          <option value="{{ $penerbit->id }}" {{ $penerbit->id == $pustaka->penerbit_id ? 'selected' : '' }}>{{ $penerbit->nama_penerbit }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="pengarang_id">Pengarang</label>
        <select name="pengarang_id" id="pengarang_id" class="form-control" required>
          @foreach($pengarangs as $pengarang)
          <option value="{{ $pengarang->id }}" {{ $pengarang->id == $pustaka->pengarang_id ? 'selected' : '' }}>{{ $pengarang->nama_pengarang }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="judul_pustaka">Judul Pustaka</label>
        <input type="text" name="judul_pustaka" id="judul_pustaka" class="form-control" value="{{ $pustaka->judul_pustaka }}" required>
      </div>

      <div class="form-group">
        <label for="harga_buku">Harga Buku</label>
        <input type="number" name="harga_buku" id="harga_buku" class="form-control" value="{{ $pustaka->harga_buku }}" required>
      </div>

      <div class="form-group">
        <label for="gambar">Gambar</label>
        @if($pustaka->gambar)
        <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Gambar Pustaka" class="img-thumbnail" width="150">
        @endif
        <input type="file" name="gambar" id="gambar" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="{{ route('pustaka.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
