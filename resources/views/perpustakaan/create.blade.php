@extends('layouts.admin')

@section('title', 'Tambah Perpustakaan')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah Perpustakaan</h4>
    <a href="{{ route('perpustakaan.index') }}" class="btn btn-secondary btn-sm float-right">Kembali ke Daftar</a>
  </div>
  <div class="card-body">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('perpustakaan.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="nama_perpustakaan">Nama Perpustakaan</label>
        <input type="text" name="nama_perpustakaan" id="nama_perpustakaan" class="form-control @error('nama_perpustakaan') is-invalid @enderror" value="{{ old('nama_perpustakaan') }}">
        @error('nama_perpustakaan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="nama_pustakawan">Nama Pustakawan</label>
        <input type="text" name="nama_pustakawan" id="nama_pustakawan" class="form-control @error('nama_pustakawan') is-invalid @enderror" value="{{ old('nama_pustakawan') }}">
        @error('nama_pustakawan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
        @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="no_telp">Nomor Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}">
        @error('no_telp')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="website">Website (Opsional)</label>
        <input type="text" name="website" id="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}">
        @error('website')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="keterangan">Keterangan (Opsional)</label>
        <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
        @error('keterangan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
