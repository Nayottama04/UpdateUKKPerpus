@extends('layouts.admin')

@section('title', 'Edit Format Buku')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Format Buku</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('format.update', $format->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="kode_format">Kode Format</label>
        <input type="text" name="kode_format" id="kode_format" class="form-control" value="{{ old('kode_format', $format->kode_format) }}" required>
        @error('kode_format')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="format">Nama Format</label>
        <input type="text" name="format" id="format" class="form-control" value="{{ old('format', $format->format) }}" required>
        @error('format')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $format->keterangan) }}</textarea>
        @error('keterangan')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="{{ route('format.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
