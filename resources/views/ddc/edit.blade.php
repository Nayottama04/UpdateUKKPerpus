@extends('layouts.admin')

@section('title', 'Edit DDC')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit DDC</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('ddc.update', $ddc->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="rak_id">Rak</label>
        <select name="rak_id" id="rak_id" class="form-control" required>
          <option value="">-- Pilih Rak --</option>
          @foreach($raks as $rak)
          <option value="{{ $rak->id }}" {{ $rak->id == $ddc->rak_id ? 'selected' : '' }}>
            {{ $rak->rak }}
          </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="kode_ddc">Kode DDC</label>
        <input type="text" name="kode_ddc" id="kode_ddc" class="form-control" value="{{ $ddc->kode_ddc }}" required>
      </div>
      <div class="form-group">
        <label for="ddc">DDC</label>
        <input type="text" name="ddc" id="ddc" class="form-control" value="{{ $ddc->ddc }}" required>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control">{{ $ddc->keterangan }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="{{ route('ddc.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
