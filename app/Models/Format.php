<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'formats';

    // Kolom yang bisa diisi
    protected $fillable = [
        'kode_format',
        'format',
        'keterangan',
    ];
}
