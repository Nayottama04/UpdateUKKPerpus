<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksis';

    protected $fillable = [
        'pustaka_id',
        'anggota_id',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_pengembalian',
        'fp',
        'keterangan',
    ];

    // Relasi ke model Pustaka
    public function pustaka()
    {
        return $this->belongsTo(Pustaka::class);
    }

    // Relasi ke model Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
