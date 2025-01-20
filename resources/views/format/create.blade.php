@extends('layouts.admin')

@section('title', 'Tambah Format Buku')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah Format Buku</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('format.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="kode_format">Kode Format</label>
        <input type="text" name="kode_format" id="kode_format" class="form-control" placeholder="Masukkan kode format" value="{{ old('kode_format') }}" required>
        @error('kode_format')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="format">Nama Format</label>
        <input type="text" name="format" id="format" class="form-control" placeholder="Masukkan nama format" value="{{ old('format') }}" required>
        @error('format')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Opsional">{{ old('keterangan') }}</textarea>
        @error('keterangan')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('format.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
