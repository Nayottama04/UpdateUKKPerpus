<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::all(); // Mengambil semua data penerbit
        return view('penerbit.index', compact('penerbits'));
    }

    public function create()
    {
        return view('penerbit.create'); // Menampilkan form tambah penerbit
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penerbit' => 'required|unique:penerbits,kode_penerbit|max:10',
            'nama_penerbit' => 'required|unique:penerbits,nama_penerbit|max:100',
            'alamat_penerbit' => 'required|max:200',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:100',
            'fax' => 'nullable|max:15',
            'website' => 'nullable|max:100',
            'kontak' => 'nullable|max:100',
        ]);

        Penerbit::create($request->all());

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.show', compact('penerbit'));
    }

    public function edit(string $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_penerbit' => 'required|unique:penerbits,kode_penerbit,' . $id . ',id|max:10',
            'nama_penerbit' => 'required|unique:penerbits,nama_penerbit,' . $id . ',id|max:100',
            'alamat_penerbit' => 'required|max:200',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:100',
            'fax' => 'nullable|max:15',
            'website' => 'nullable|max:100',
            'kontak' => 'nullable|max:100',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus.');
    }
}
