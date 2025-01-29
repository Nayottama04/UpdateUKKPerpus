@extends('layouts.admin')

@section('title', 'Edit Perpustakaan')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Perpustakaan</h4>
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

    <form action="{{ route('perpustakaan.update', $perpustakaan->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="nama_perpustakaan">Nama Perpustakaan</label>
        <input type="text" name="nama_perpustakaan" id="nama_perpustakaan" class="form-control" value="{{ old('nama_perpustakaan', $perpustakaan->nama_perpustakaan) }}" required>
      </div>

      <div class="form-group">
        <label for="nama_pustakawan">Nama Pustakawan</label>
        <input type="text" name="nama_pustakawan" id="nama_pustakawan" class="form-control" value="{{ old('nama_pustakawan', $perpustakaan->nama_pustakawan) }}" required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $perpustakaan->alamat) }}</textarea>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $perpustakaan->email) }}" required>
      </div>

      <div class="form-group">
        <label for="no_telp">Nomor Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ old('no_telp', $perpustakaan->no_telp) }}" required>
      </div>

      <div class="form-group">
        <label for="website">Website (Opsional)</label>
        <input type="text" name="website" id="website" class="form-control" value="{{ old('website', $perpustakaan->website) }}">
      </div>

      <div class="form-group">
        <label for="keterangan">Keterangan (Opsional)</label>
        <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $perpustakaan->keterangan) }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="{{ route('perpustakaan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
