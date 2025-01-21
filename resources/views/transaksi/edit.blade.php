@extends('layouts.admin')

@section('title', 'Edit Transaksi')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Transaksi</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="pustaka_id">Pustaka</label>
        <select name="pustaka_id" id="pustaka_id" class="form-control" required>
          @foreach($pustakas as $pustaka)
          <option value="{{ $pustaka->id }}" {{ $pustaka->id == $transaksi->pustaka_id ? 'selected' : '' }}>
            {{ $pustaka->judul_pustaka }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="anggota_id">Anggota</label>
        <select name="anggota_id" id="anggota_id" class="form-control" required>
          @foreach($anggotas as $anggota)
          <option value="{{ $anggota->id }}" {{ $anggota->id == $transaksi->anggota_id ? 'selected' : '' }}>
            {{ $anggota->nama_anggota }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="tgl_pinjam">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="{{ $transaksi->tgl_pinjam }}" required>
      </div>

      <div class="form-group">
        <label for="tgl_kembali">Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" value="{{ $transaksi->tgl_kembali }}" required>
      </div>

      <div class="form-group">
        <label for="tgl_pengembalian">Tanggal Pengembalian</label>
        <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" value="{{ $transaksi->tgl_pengembalian }}">
      </div>

      <div class="form-group">
        <label for="fp">FP</label>
        <select name="fp" id="fp" class="form-control" required>
          <option value="0" {{ $transaksi->fp == '0' ? 'selected' : '' }}>Tidak</option>
          <option value="1" {{ $transaksi->fp == '1' ? 'selected' : '' }}>Ya</option>
        </select>
      </div>

      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $transaksi->keterangan }}">
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
