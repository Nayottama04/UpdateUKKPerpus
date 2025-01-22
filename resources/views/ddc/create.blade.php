@extends('layouts.admin')

@section('title', 'Tambah DDC')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah DDC</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('ddc.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="rak_id">Rak</label>
        <select name="rak_id" id="rak_id" class="form-control" required>
          <option value="">-- Pilih Rak --</option>
          @foreach($raks as $rak)
          <option value="{{ $rak->id }}">{{ $rak->rak }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="kode_ddc">Kode DDC</label>
        <input type="text" name="kode_ddc" id="kode_ddc" class="form-control" placeholder="Masukkan kode DDC" required>
      </div>
      <div class="form-group">
        <label for="ddc">DDC</label>
        <input type="text" name="ddc" id="ddc" class="form-control" placeholder="Masukkan nama DDC" required>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('ddc.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
