<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisAnggota extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel di database
    protected $table = 'jenis_anggotas';

    // Kolom yang bisa diisi
    protected $fillable = [
        'kode_jenis_anggota',
        'jns_anggota',
        'max_pinjam',
        'keterangan',
    ];
}
