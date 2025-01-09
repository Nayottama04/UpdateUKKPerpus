<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    // Gunakan tabel 'raks_table'
    protected $table = 'raks';

    // Kolom yang bisa diisi
    protected $fillable = [
        'kode_rak',
        'rak',
        'keterangan',
    ];
}
