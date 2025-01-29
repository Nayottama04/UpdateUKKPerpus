@extends('layouts.admin')

@section('title', 'Edit Rak')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Rak</h4>
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

    <form action="{{ route('rak.update', $rak->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="kode_rak">Kode Rak</label>
        <input type="text" name="kode_rak" id="kode_rak" class="form-control" placeholder="Masukkan kode rak" value="{{ old('kode_rak', $rak->kode_rak) }}" required>
        @error('kode_rak')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="rak">Nama Rak</label>
        <input type="text" name="rak" id="rak" class="form-control" placeholder="Masukkan nama rak" value="{{ old('rak', $rak->rak) }}" required>
        @error('rak')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Opsional">{{ old('keterangan', $rak->keterangan) }}</textarea>
        @error('keterangan')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="{{ route('rak.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
