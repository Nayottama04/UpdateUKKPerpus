@extends('layouts.admin')

@section('title', 'Tambah Jenis Anggota')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah Jenis Anggota</h4>
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

    <form action="{{ route('jenis-anggota.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="kode_jenis_anggota">Kode Jenis</label>
        <input type="text" name="kode_jenis_anggota" id="kode_jenis_anggota" class="form-control" placeholder="Masukkan kode jenis (2 karakter)" value="{{ old('kode_jenis_anggota') }}" maxlength="2" required>
        @error('kode_jenis_anggota')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="jns_anggota">Nama Jenis</label>
        <input type="text" name="jns_anggota" id="jns_anggota" class="form-control" placeholder="Masukkan nama jenis" value="{{ old('jns_anggota') }}" maxlength="15" required>
        @error('jns_anggota')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="max_pinjam">Maksimal Pinjam</label>
        <input type="number" name="max_pinjam" id="max_pinjam" class="form-control" placeholder="Masukkan jumlah maksimal pinjam" value="{{ old('max_pinjam') }}" min="1" required>
        @error('max_pinjam')
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
      <a href="{{ route('jenis-anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
