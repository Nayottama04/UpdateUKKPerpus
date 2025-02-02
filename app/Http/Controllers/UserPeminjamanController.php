<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pustaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserPeminjamanController extends Controller
{
    public function store(Request $request)
    {
        // Pastikan pustaka ada
        $pustaka = Pustaka::findOrFail($request->pustaka_id);

        // Validasi jika buku sudah dipinjam terlalu banyak
        if ($pustaka->jml_pinjam <= 0) {
            return back()->with('error', 'Buku ini tidak tersedia untuk dipinjam.');
        }

        // Simpan transaksi peminjaman
        Transaksi::create([
            'pustaka_id' => $pustaka->id,
            'anggota_id' => Auth::user()->anggota->id,
            'tgl_pinjam' => Carbon::now(),
            'tgl_kembali' => Carbon::now()->addDays(7), // Masa pinjam default 7 hari
            'fp' => '0', // 0 berarti belum dikembalikan
            'keterangan' => 'Dipinjam',
        ]);

        // Kurangi jumlah buku yang tersedia
        $pustaka->decrement('jml_pinjam');

        return redirect('/home')->with('success', 'Buku berhasil dipinjam!');
    }
    public function riwayat()
    {
        // Cek apakah user memiliki anggota terkait
    
        $transaksis = Transaksi::where('anggota_id', auth()->user()->anggota->id)->latest()->get();
    
        return view('user.transaksi', compact('transaksis'));
    }
    


}
