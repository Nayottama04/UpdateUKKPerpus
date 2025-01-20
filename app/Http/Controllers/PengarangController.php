<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    public function index()
    {
        $pengarang = Pengarang::all(); // Mengambil semua data pengarang
        return view('pengarang.index', compact('pengarang'));
    }

    public function create()
    {
        return view('pengarang.create'); // Menampilkan form tambah pengarang
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pengarang' => 'required|unique:pengarangs,kode_pengarang|max:10',
            'gelar_depan' => 'nullable|max:20',
            'nama_pengarang' => 'required|unique:pengarangs,nama_pengarang|max:100',
            'gelar_belakang' => 'nullable|max:20',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:100',
            'website' => 'nullable|max:100',
            'biografi' => 'nullable',
            'keterangan' => 'nullable|max:100',
        ]);

        Pengarang::create($request->all());

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.show', compact('pengarang'));
    }

    public function edit(string $id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.edit', compact('pengarang'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pengarang' => 'required|unique:pengarangs,kode_pengarang,' . $id . ',id|max:10',
            'gelar_depan' => 'nullable|max:20',
            'nama_pengarang' => 'required|unique:pengarangs,nama_pengarang,' . $id . ',id|max:100',
            'gelar_belakang' => 'nullable|max:20',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:100',
            'website' => 'nullable|max:100',
            'biografi' => 'nullable',
            'keterangan' => 'nullable|max:100',
        ]);

        $pengarang = Pengarang::findOrFail($id);
        $pengarang->update($request->all());

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil dihapus.');
    }
}
