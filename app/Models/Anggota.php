<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel di database
    protected $table = 'anggotas';

    // Kolom yang bisa diisi
    protected $fillable = [
        'jenis_anggota_id',
        'kode_anggota',
        'nama_anggota',
        'tempat',
        'tgl_lahir',
        'alamat',
        'no_telp',
        'email',
        'tgl_daftar',
        'masa_aktif',
        'fa',
        'keterangan',
        'foto',
        'username',
        'password',
    ];

    // Relasi ke model JenisAnggota
    public function jenisAnggota()
    {
        return $this->belongsTo(JenisAnggota::class, 'jenis_anggota_id');
    }
}
