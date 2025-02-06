@extends('layouts.admin')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah Transaksi</h4>
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

    <form action="{{ route('transaksi.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="pustaka_id">Pustaka</label>
        <select name="pustaka_id" id="pustaka_id" class="form-control" required>
          <option value="">-- Pilih Pustaka --</option>
          @foreach($pustakas as $pustaka)
          <option value="{{ $pustaka->id }}">{{ $pustaka->judul_pustaka }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="anggota_id">Anggota</label>
        <select name="anggota_id" id="anggota_id" class="form-control" required>
          <option value="">-- Pilih Anggota --</option>
          @foreach($anggotas as $anggota)
          <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="tgl_pinjam">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" 
          value="{{ date('Y-m-d') }}" readonly required>
      </div>

      <div class="form-group">
        <label for="tgl_kembali">Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" 
          value="{{ date('Y-m-d', strtotime('+5 days')) }}" readonly required>
      </div>

      <div class="form-group">
        <label for="tgl_pengembalian">Tanggal Pengembalian</label>
        <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control">
      </div>

      <div class="form-group">
        <label for="fp">FP</label>
        <select name="fp" id="fp" class="form-control" required>
          <option value="0">Tidak</option>
          <option value="1">Ya</option>
        </select>
      </div>

      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" id="keterangan" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection