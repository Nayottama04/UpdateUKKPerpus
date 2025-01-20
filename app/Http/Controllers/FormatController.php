<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function index()
    {
        $format = Format::all(); // Mengambil semua data format
        return view('format.index', compact('format'));
    }

    public function create()
    {
        return view('format.create'); // Menampilkan form tambah format
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_format' => 'required|unique:formats,kode_format|max:10',
            'format' => 'required|unique:formats,format|max:50',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Format::create($request->all());

        return redirect()->route('format.index')->with('success', 'Format Buku berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $format = Format::findOrFail($id); // Mengambil data format berdasarkan ID
        return view('format.show', compact('format'));
    }

    public function edit($id)
    {
        $format = Format::findOrFail($id);
        return view('format.edit',   compact('format'));
    }    

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_format' => 'required|unique:formats,kode_format,' . $id . ',id|max:10',
            'format' => 'required|unique:formats,format,' . $id . ',id|max:50',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $format = Format::findOrFail($id);
        $format->update($request->all());

        return redirect()->route('format.index')->with('success', 'Format Buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $format = Format::findOrFail($id);
        $format->delete();

        return redirect()->route('format.index')->with('success', 'Format Buku berhasil dihapus.');
    }
}
