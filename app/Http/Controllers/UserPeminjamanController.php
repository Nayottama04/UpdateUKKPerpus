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
    $request->validate([
        'pustaka_id' => 'required|exists:pustakas,id',
        'anggota_id' => 'required|exists:anggotas,id',
        'tgl_pinjam' => 'required|date|after_or_equal:today',
        'tgl_kembali' => 'required|date|after:tgl_pinjam',
    ]);

    $pustaka = Pustaka::findOrFail($request->pustaka_id);

    // Cek apakah buku masih tersedia
    if ($pustaka->jml_pinjam <= 0) {
        return back()->with('error', 'Buku ini tidak tersedia untuk dipinjam.');
    }

    // Simpan transaksi peminjaman
    Transaksi::create([
        'pustaka_id' => $pustaka->id,
        'anggota_id' => $request->anggota_id,
        'tgl_pinjam' => $request->tgl_pinjam,
        'tgl_kembali' => $request->tgl_kembali,
        'fp' => '0', // Belum dikembalikan
        'keterangan' => 'Dipinjam',
    ]);

    // Kurangi jumlah buku yang tersedia
    $pustaka->decrement('jml_pinjam');

    return redirect()->route('user.home')->with('success', 'Buku berhasil dipinjam!');
}
    public function riwayat()
    {
        // Cek apakah user memiliki anggota terkait
    
        $transaksis = Transaksi::where('anggota_id', auth()->user()->anggota->id)->latest()->get();
    
        return view('user.transaksi', compact('transaksis'));
    }
    
    public function kembalikan($id)
{
    $transaksi = Transaksi::where('id', $id)
                          ->where('anggota_id', auth()->user()->anggota->id)
                          ->whereNull('tgl_pengembalian')
                          ->firstOrFail();

    // Set tanggal pengembalian ke hari ini
    $transaksi->update([
        'tgl_pengembalian' => now(),
    ]);

    // Tambah kembali jumlah buku yang tersedia
    $transaksi->pustaka->increment('jml_pinjam');

    return back()->with('success', 'Buku berhasil dikembalikan!');
}

    


}
