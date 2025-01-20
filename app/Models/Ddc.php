<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ddc extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel di database
    protected $table = 'ddcs';

    // Kolom yang bisa diisi
    protected $fillable = [
        'rak_id',
        'kode_ddc',
        'ddc',
        'keterangan',
    ];

    // Relasi ke model Rak
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
}
