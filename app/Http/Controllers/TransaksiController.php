<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pustaka;
use App\Models\Anggota;
use Illuminate\Http\Request;

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
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
            'tgl_pengembalian' => 'nullable|date',
            'fp' => 'required|in:0,1',
            'keterangan' => 'nullable|max:5',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $transaksi = Transaksi::with(['pustaka', 'anggota'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pustakas = Pustaka::all();
        $anggotas = Anggota::all();
        return view('transaksi.edit', compact('transaksi', 'pustakas', 'anggotas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pustaka_id' => 'required|exists:pustakas,id',
            'anggota_id' => 'required|exists:anggotas,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
            'tgl_pengembalian' => 'nullable|date',
            'fp' => 'required|in:0,1',
            'keterangan' => 'nullable|max:5',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
