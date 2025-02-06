<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pustaka;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pustaka', 'anggota'])->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pustakas = Pustaka::all();
        $anggotas = Anggota::all();
        return view('transaksi.create', compact('pustakas', 'anggotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pustaka_id' => 'required|exists:pustakas,id',
            'anggota_id' => 'required|exists:anggotas,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after:tgl_pinjam',
        ]);

        $pustaka = Pustaka::findOrFail($request->pustaka_id);

        // Kurangi jumlah buku yang tersedia
        if ($pustaka->jml_pinjam <= 0) {
            return back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }
        $pustaka->decrement('jml_pinjam');

        Transaksi::create([
            'pustaka_id' => $request->pustaka_id,
            'anggota_id' => $request->anggota_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'fp' => '0', // Belum dikembalikan
            'keterangan' => 'Dipinjam',
            'status_pembayaran' => 'belum',
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['pustaka', 'anggota'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pustakas = Pustaka::all();
        $anggotas = Anggota::all();
        return view('transaksi.edit', compact('transaksi', 'pustakas', 'anggotas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pustaka_id' => 'required|exists:pustakas,id',
            'anggota_id' => 'required|exists:anggotas,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after:tgl_pinjam',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function kembalikan(Request $request, $id)
{
    $request->validate([
        'kondisi_buku' => 'required|in:Baik,Rusak,Hilang'
    ]);

    $transaksi = Transaksi::with('pustaka')->findOrFail($id);

    // Hitung keterlambatan
    $tglKembali = Carbon::parse($transaksi->tgl_kembali);
    $tglPengembalian = Carbon::now();
    $hariTelat = max($tglKembali->diffInDays($tglPengembalian, false), 0);

    // Hitung denda berdasarkan keterlambatan
    $dendaTerlambat = $hariTelat * ($transaksi->pustaka->denda_terlambat ?? 0);

    // Hitung denda berdasarkan kondisi buku
    $dendaKondisi = 0;
    if ($request->kondisi_buku == 'Hilang') {
        $dendaKondisi = $transaksi->pustaka->denda_hilang;
    } elseif ($request->kondisi_buku == 'Rusak') {
        $dendaKondisi = $transaksi->pustaka->denda_hilang / 2; // Denda 50% jika rusak
    }

    // Total denda
    $totalDenda = $dendaTerlambat + $dendaKondisi;

    // Update transaksi
    $transaksi->update([
        'tgl_pengembalian' => $tglPengembalian,
        'kondisi_buku' => $request->kondisi_buku,
        'total_denda' => $totalDenda,
        'status_pembayaran' => 'belum' // Status tetap "belum" tetapi tidak memblokir pengembalian
    ]);

    // Kembalikan stok buku jika tidak hilang
    if ($request->kondisi_buku !== 'Hilang') {
        $transaksi->pustaka->increment('jml_pinjam');
    }

    return redirect()->route('user.transaksi')->with('success', 'Buku berhasil dikembalikan.');
}

    

   

    
}
