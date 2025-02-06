<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pustaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserPeminjamanController extends Controller
{
    // Peminjaman buku oleh user
    public function store(Request $request)
{
    $request->validate([
        'pustaka_id' => 'required|exists:pustakas,id',
        'anggota_id' => 'required|exists:anggotas,id',
    ]);

    $pustaka = Pustaka::findOrFail($request->pustaka_id);

    if ($pustaka->jml_pinjam <= 0) {
        return back()->with('error', 'Buku ini tidak tersedia untuk dipinjam.');
    }

    // Set tanggal pinjam ke hari ini dan tanggal kembali ke 5 hari ke depan
    $tanggalPinjam = now();
    $tanggalKembali = now()->addDays(5);

    // Simpan transaksi peminjaman
    Transaksi::create([
        'pustaka_id' => $pustaka->id,
        'anggota_id' => $request->anggota_id,
        'tgl_pinjam' => $tanggalPinjam,
        'tgl_kembali' => $tanggalKembali,
        'fp' => '0', // Belum dikembalikan
        'status_pembayaran' => 'belum',
        'keterangan' => 'Dipinjam',
    ]);

    $pustaka->decrement('jml_pinjam');

    return redirect()->route('user.home')->with('success', 'Buku berhasil dipinjam! Batas pengembalian: ' . $tanggalKembali->format('d-m-Y'));
}


    // Menampilkan riwayat peminjaman user
    public function riwayat()
    {
        $transaksis = Transaksi::where('anggota_id', auth()->user()->anggota->id)
            ->latest()
            ->get();

        return view('user.transaksi', compact('transaksis'));
    }

    // Proses pengembalian buku
    public function kembalikan(Request $request, $id)
{
    $transaksi = Transaksi::findOrFail($id);

    // Pastikan denda sudah dibayar sebelum mengembalikan buku
   

    // Set tanggal pengembalian
    $transaksi->update([
        'tgl_pengembalian' => now(),
        'kondisi' => $request->kondisi,
        'total_denda' => $request->total_denda
    ]);

    return redirect()->route('user.transaksi')->with('success', 'Buku berhasil dikembalikan!');
}


    // Menampilkan halaman pembayaran denda
    public function pembayaran($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Hitung denda hanya jika sudah terlambat
        $hari_terlambat = max(0, now()->diffInDays(Carbon::parse($transaksi->tgl_pengembalian), false));
        $denda = $hari_terlambat * $transaksi->pustaka->denda_terlambat;

        return view('user.pembayaran.index', compact('transaksi', 'hari_terlambat', 'denda'));
    }

    // Proses pembayaran denda
    public function prosesPembayaran($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Pastikan ada denda yang harus dibayar
        $hari_terlambat = max(0, now()->diffInDays(Carbon::parse($transaksi->tgl_pengembalian), false));
        if ($hari_terlambat <= 0) {
            return redirect()->route('user.pembayaran.index')->with('error', 'Tidak ada denda yang harus dibayar.');
        }

        // Tandai pembayaran sebagai lunas
        $transaksi->update([
            'status_pembayaran' => 'lunas',
        ]);

        return redirect()->route('user.transaksi')->with('success', 'Denda telah dibayar. Silakan kembalikan buku.');
    }
}
