<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pustaka extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pustakas';

    protected $fillable = [
        'kode_pustaka',
        'ddc_id',
        'format_id',
        'penerbit_id',
        'pengarang_id',
        'isbn',
        'judul_pustaka',
        'tahun_terbit',
        'keyword',
        'keterangan_fisik',
        'keterangan_tambahan',
        'abstraksi',
        'gambar',
        'harga_buku',
        'kondisi_buku',
        'rp',
        'jml_pinjam',
        'denda_terlambat',
        'denda_hilang',
    ];

    // Relasi ke model DDC
    public function ddc()
    {
        return $this->belongsTo(Ddc::class);
    }

    // Relasi ke model Format
    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    // Relasi ke model Penerbit
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    // Relasi ke model Pengarang
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }
}
