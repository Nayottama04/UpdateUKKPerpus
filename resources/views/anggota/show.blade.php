@extends('layouts.admin')

@section('title', 'Detail Anggota')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Anggota</h4>
    <a href="{{ route('anggota.index') }}" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Kode Anggota</th>
        <td>{{ $anggota->kode_anggota }}</td>
      </tr>
      <tr>
        <th>Nama Anggota</th>
        <td>{{ $anggota->nama_anggota }}</td>
      </tr>
      <tr>
        <th>Jenis Anggota</th>
        <td>{{ $anggota->jenisAnggota->jns_anggota }}</td>
      </tr>
      <tr>
        <th>Tempat, Tanggal Lahir</th>
        <td>{{ $anggota->tempat }}, {{ $anggota->tgl_lahir }}</td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td>{{ $anggota->alamat }}</td>
      </tr>
      <tr>
        <th>No. Telepon</th>
        <td>{{ $anggota->no_telp }}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{ $anggota->email }}</td>
      </tr>
      <tr>
        <th>Tanggal Daftar</th>
        <td>{{ $anggota->tgl_daftar }}</td>
      </tr>
      <tr>
        <th>Masa Aktif</th>
        <td>{{ $anggota->masa_aktif }}</td>
      </tr>
      <tr>
        <th>Aktif?</th>
        <td>{{ $anggota->fa == 'Y' ? 'Ya' : 'Tidak' }}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{{ $anggota->keterangan ?? 'Tidak ada' }}</td>
      </tr>
      <tr>
        <th>Foto</th>
        <td>
          @if($anggota->foto)
         <img src="{{ asset('storage/') }}" alt="Foto Anggota" class="img-thumbnail" width="150">
          @else
          Tidak ada foto
          @endif
        </td>
      </tr>
      <tr>
        <th>Username</th>
        <td>{{ $anggota->username }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
