<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'perpustakaans';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_perpustakaan',
        'nama_pustakawan',
        'alamat',
        'email',
        'no_telp',
        'website',
        'keterangan',
    ];

    // Tambahkan atribut tambahan atau relasi jika diperlukan
}
