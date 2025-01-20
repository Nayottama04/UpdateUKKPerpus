@extends('layouts.admin')

@section('title', 'Tambah Pengarang')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah Pengarang</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('pengarang.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="kode_pengarang">Kode Pengarang</label>
        <input type="text" name="kode_pengarang" id="kode_pengarang" class="form-control" value="{{ old('kode_pengarang') }}" required>
      </div>
      <div class="form-group">
        <label for="gelar_depan">Gelar Depan</label>
        <input type="text" name="gelar_depan" id="gelar_depan" class="form-control" value="{{ old('gelar_depan') }}">
      </div>
      <div class="form-group">
        <label for="nama_pengarang">Nama Pengarang</label>
        <input type="text" name="nama_pengarang" id="nama_pengarang" class="form-control" value="{{ old('nama_pengarang') }}" required>
      </div>
      <div class="form-group">
        <label for="gelar_belakang">Gelar Belakang</label>
        <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control" value="{{ old('gelar_belakang') }}">
      </div>
      <div class="form-group">
        <label for="no_telp">No. Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ old('no_telp') }}" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
      </div>
      <div class="form-group">
        <label for="website">Website</label>
        <input type="text" name="website" id="website" class="form-control" value="{{ old('website') }}">
      </div>
      <div class="form-group">
        <label for="biografi">Biografi</label>
        <textarea name="biografi" id="biografi" class="form-control">{{ old('biografi') }}</textarea>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ old('keterangan') }}">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('pengarang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
