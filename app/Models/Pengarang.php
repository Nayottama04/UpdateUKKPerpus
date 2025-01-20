<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengarang extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel di database
    protected $table = 'pengarangs';

    // Kolom yang bisa diisi
    protected $fillable = [
        'kode_pengarang',
        'gelar_depan',
        'nama_pengarang',
        'gelar_belakang',
        'no_telp',
        'email',
        'website',
        'biografi',
        'keterangan',
    ];
}
