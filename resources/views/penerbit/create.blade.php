@extends('layouts.admin')

@section('title', 'Tambah Penerbit')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah Penerbit</h4>
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

    <form action="{{ route('penerbit.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="kode_penerbit">Kode Penerbit</label>
        <input type="text" name="kode_penerbit" id="kode_penerbit" class="form-control" placeholder="Masukkan kode penerbit" required>
      </div>
      <div class="form-group">
        <label for="nama_penerbit">Nama Penerbit</label>
        <input type="text" name="nama_penerbit" id="nama_penerbit" class="form-control" placeholder="Masukkan nama penerbit" required>
      </div>
      <div class="form-group">
        <label for="alamat_penerbit">Alamat Penerbit</label>
        <input type="text" name="alamat_penerbit" id="alamat_penerbit" class="form-control" placeholder="Masukkan alamat penerbit" required>
      </div>
      <div class="form-group">
        <label for="no_telp">No. Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan nomor telepon" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
      </div>
      <div class="form-group">
        <label for="fax">Fax</label>
        <input type="text" name="fax" id="fax" class="form-control" placeholder="Masukkan nomor fax">
      </div>
      <div class="form-group">
        <label for="website">Website</label>
        <input type="text" name="website" id="website" class="form-control" placeholder="Masukkan website">
      </div>
      <div class="form-group">
        <label for="kontak">Kontak</label>
        <input type="text" name="kontak" id="kontak" class="form-control" placeholder="Masukkan kontak">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('penerbit.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
