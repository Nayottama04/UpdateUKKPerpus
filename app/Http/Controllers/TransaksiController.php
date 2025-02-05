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

    public function kembalikan($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Cek apakah user sudah membayar denda
        if ($transaksi->status_pembayaran == 'belum') {
            return redirect()->route('user.pembayaran.index')->with('error', 'Anda harus membayar denda sebelum mengembalikan buku.');
        }

        // Set tanggal pengembalian dan kembalikan stok buku
        $transaksi->update(['tgl_pengembalian' => Carbon::now()]);
        $transaksi->pustaka->increment('jml_pinjam');

        return redirect()->route('user.transaksi')->with('success', 'Buku berhasil dikembalikan.');
    }

    public function approve($id)
    {
        $transaksi = Transaksi::findOrFail($id);
    
        // Pastikan denda sudah dibayar sebelum approve
        if ($transaksi->status_pembayaran != 'lunas') {
            return back()->with('error', 'User belum membayar denda, tidak bisa approve pengembalian.');
        }
    
        // Set tanggal pengembalian
        $transaksi->tgl_pengembalian = Carbon::now();
        $transaksi->save();
    
        return back()->with('success', 'Buku berhasil dikembalikan!');
    }
    
}
