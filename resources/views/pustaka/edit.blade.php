@extends('layouts.admin')

@section('title', 'Edit Pustaka')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Pustaka</h4>
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

    <form action="{{ route('pustaka.update', $pustaka->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="kode_pustaka">Kode Pustaka</label>
        <input type="number" name="kode_pustaka" id="kode_pustaka" class="form-control" placeholder="Masukkan kode pustaka" value="{{ $pustaka->kode_pustaka }}" required>
      </div>

      <div class="form-group">
        <label for="ddc_id">DDC</label>
        <select name="ddc_id" id="ddc_id" class="form-control" required>
          <option value="">-- Pilih DDC --</option>
          @foreach($ddcs as $ddc)
          <option value="{{ $ddc->id }}" {{ $ddc->id == $pustaka->ddc_id ? 'selected' : '' }}>{{ $ddc->ddc }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="format_id">Format</label>
        <select name="format_id" id="format_id" class="form-control" required>
          <option value="">-- Pilih Format --</option>
          @foreach($formats as $format)
          <option value="{{ $format->id }}" {{ $format->id == $pustaka->format_id ? 'selected' : '' }}>{{ $format->format }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="penerbit_id">Penerbit</label>
        <select name="penerbit_id" id="penerbit_id" class="form-control" required>
          <option value="">-- Pilih Penerbit --</option>
          @foreach($penerbits as $penerbit)
          <option value="{{ $penerbit->id }}" {{ $penerbit->id == $pustaka->penerbit_id ? 'selected' : '' }}>{{ $penerbit->nama_penerbit }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="pengarang_id">Pengarang</label>
        <select name="pengarang_id" id="pengarang_id" class="form-control" required>
          <option value="">-- Pilih Pengarang --</option>
          @foreach($pengarangs as $pengarang)
          <option value="{{ $pengarang->id }}" {{ $pengarang->id == $pustaka->pengarang_id ? 'selected' : '' }}>{{ $pengarang->nama_pengarang }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Masukkan ISBN" value="{{ $pustaka->isbn }}" required>
      </div>

      <div class="form-group">
        <label for="judul_pustaka">Judul Pustaka</label>
        <input type="text" name="judul_pustaka" id="judul_pustaka" class="form-control" placeholder="Masukkan judul pustaka" value="{{ $pustaka->judul_pustaka }}" required>
      </div>

      <div class="form-group">
        <label for="tahun_terbit">Tahun Terbit</label>
        <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukkan tahun terbit" value="{{ $pustaka->tahun_terbit }}" required>
      </div>

      <div class="form-group">
        <label for="keyword">Keyword</label>
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Masukkan keyword" value="{{ $pustaka->keyword }}">
      </div>

      <div class="form-group">
        <label for="keterangan_fisik">Keterangan Fisik</label>
        <input type="text" name="keterangan_fisik" id="keterangan_fisik" class="form-control" placeholder="Masukkan keterangan fisik" value="{{ $pustaka->keterangan_fisik }}">
      </div>

      <div class="form-group">
        <label for="keterangan_tambahan">Keterangan Tambahan</label>
        <input type="text" name="keterangan_tambahan" id="keterangan_tambahan" class="form-control" placeholder="Masukkan keterangan tambahan" value="{{ $pustaka->keterangan_tambahan }}">
      </div>

      <div class="form-group">
        <label for="abstraksi">Abstraksi</label>
        <textarea name="abstraksi" id="abstraksi" class="form-control" placeholder="Masukkan abstraksi">{{ $pustaka->abstraksi }}</textarea>
      </div>

      <div class="form-group">
        <label for="gambar">Gambar Buku</label>
        @if($pustaka->gambar)
        <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Gambar Pustaka" class="img-thumbnail mb-2" width="150">
        @endif
        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
      </div>

      <div class="form-group">
        <label for="harga_buku">Harga Buku</label>
        <input type="number" name="harga_buku" id="harga_buku" class="form-control" placeholder="Masukkan harga buku" value="{{ $pustaka->harga_buku }}" required>
      </div>

      <div class="form-group">
        <label for="kondisi_buku">Kondisi Buku</label>
        <input type="text" name="kondisi_buku" id="kondisi_buku" class="form-control" placeholder="Masukkan kondisi buku" value="{{ $pustaka->kondisi_buku }}" required>
      </div>

      <div class="form-group">
        <label for="rp">Ready to Publish (RP)</label>
        <select name="rp" id="rp" class="form-control" required>
          <option value="0" {{ $pustaka->rp == 0 ? 'selected' : '' }}>Tidak</option>
          <option value="1" {{ $pustaka->rp == 1 ? 'selected' : '' }}>Ya</option>
        </select>
      </div>

      <div class="form-group">
        <label for="jml_pinjam">Jumlah Pinjam</label>
        <input type="number" name="jml_pinjam" id="jml_pinjam" class="form-control" placeholder="Masukkan jumlah pinjam" value="{{ $pustaka->jml_pinjam }}" required>
      </div>

      <div class="form-group">
        <label for="denda_terlambat">Denda Terlambat</label>
        <input type="number" name="denda_terlambat" id="denda_terlambat" class="form-control" placeholder="Masukkan denda terlambat" value="{{ $pustaka->denda_terlambat }}" required>
      </div>

      <div class="form-group">
        <label for="denda_hilang">Denda Hilang</label>
        <input type="number" name="denda_hilang" id="denda_hilang" class="form-control" placeholder="Masukkan denda hilang" value="{{ $pustaka->denda_hilang }}" required>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="{{ route('pustaka.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection