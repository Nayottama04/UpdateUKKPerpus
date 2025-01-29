@extends('layouts.admin')

@section('title', 'Edit Jenis Anggota')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Jenis Anggota</h4>
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

    <form action="{{ route('jenis-anggota.update', $jenisAnggota->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="kode_jenis_anggota">Kode Jenis</label>
        <input type="text" name="kode_jenis_anggota" id="kode_jenis_anggota" class="form-control" value="{{ old('kode_jenis_anggota', $jenisAnggota->kode_jenis_anggota) }}" maxlength="2" required>
      </div>

      <div class="form-group">
        <label for="jns_anggota">Nama Jenis</label>
        <input type="text" name="jns_anggota" id="jns_anggota" class="form-control" value="{{ old('jns_anggota', $jenisAnggota->jns_anggota) }}" maxlength="15" required>
      </div>

      <div class="form-group">
        <label for="max_pinjam">Maksimal Pinjam</label>
        <input type="number" name="max_pinjam" id="max_pinjam" class="form-control" value="{{ old('max_pinjam', $jenisAnggota->max_pinjam) }}" min="1" required>
      </div>

      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $jenisAnggota->keterangan) }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="{{ route('jenis-anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
