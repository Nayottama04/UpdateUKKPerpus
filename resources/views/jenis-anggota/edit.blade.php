@extends('layouts.admin')

@section('title', 'Edit Anggota')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Anggota</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="jenis_anggota_id">Jenis Anggota</label>
        <select name="jenis_anggota_id" id="jenis_anggota_id" class="form-control" required>
          <option value="">-- Pilih Jenis Anggota --</option>
          @foreach($jenisAnggota as $j)
          <option value="{{ $j->id }}" {{ $j->id == $anggota->jenis_anggota_id ? 'selected' : '' }}>
            {{ $j->jns_anggota }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="kode_anggota">Kode Anggota</label>
        <input type="text" name="kode_anggota" id="kode_anggota" class="form-control" value="{{ old('kode_anggota', $anggota->kode_anggota) }}" required>
      </div>

      <div class="form-group">
        <label for="nama_anggota">Nama Anggota</label>
        <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" value="{{ old('nama_anggota', $anggota->nama_anggota) }}" required>
      </div>

      <div class="form-group">
        <label for="tempat">Tempat Lahir</label>
        <input type="text" name="tempat" id="tempat" class="form-control" value="{{ old('tempat', $anggota->tempat) }}" required>
      </div>

      <div class="form-group">
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $anggota->tgl_lahir) }}" required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $anggota->alamat) }}" required>
      </div>

      <div class="form-group">
        <label for="no_telp">No. Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ old('no_telp', $anggota->no_telp) }}" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $anggota->email) }}" required>
      </div>

      <div class="form-group">
        <label for="tgl_daftar">Tanggal Daftar</label>
        <input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control" value="{{ old('tgl_daftar', $anggota->tgl_daftar) }}" required>
      </div>

      <div class="form-group">
        <label for="masa_aktif">Masa Aktif</label>
        <input type="date" name="masa_aktif" id="masa_aktif" class="form-control" value="{{ old('masa_aktif', $anggota->masa_aktif) }}" required>
      </div>

      <div class="form-group">
        <label for="fa">Aktif?</label>
        <select name="fa" id="fa" class="form-control" required>
          <option value="Y" {{ $anggota->fa == 'Y' ? 'selected' : '' }}>Ya</option>
          <option value="T" {{ $anggota->fa == 'T' ? 'selected' : '' }}>Tidak</option>
        </select>
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $anggota->username) }}" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" value="{{ old('password', $anggota->password) }}" required>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
