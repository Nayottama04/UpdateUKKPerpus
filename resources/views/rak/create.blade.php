@extends('layouts.admin')

@section('title', 'Tambah Rak')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah Rak Baru</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('rak.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="kode_rak">Kode Rak</label>
        <input type="text" name="kode_rak" id="kode_rak" class="form-control" placeholder="Masukkan kode rak" value="{{ old('kode_rak') }}" required>
        @error('kode_rak')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="rak">Nama Rak</label>
        <input type="text" name="rak" id="rak" class="form-control" placeholder="Masukkan nama rak" value="{{ old('rak') }}" required>
        @error('rak')
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
      <a href="{{ route('rak.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection