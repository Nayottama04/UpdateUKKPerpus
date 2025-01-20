<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penerbit extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel di database
    protected $table = 'penerbits';

    // Kolom yang bisa diisi
    protected $fillable = [
        'kode_penerbit',
        'nama_penerbit',
        'alamat_penerbit',
        'no_telp',
        'email',
        'fax',
        'website',
        'kontak',
    ];
}
