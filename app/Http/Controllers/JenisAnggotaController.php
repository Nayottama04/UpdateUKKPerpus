<?php

namespace App\Http\Controllers;

use App\Models\JenisAnggota;
use Illuminate\Http\Request;

class JenisAnggotaController extends Controller
{
    public function index()
    {
        $jenisAnggota = JenisAnggota::all(); // Mengambil semua data jenis anggota
        return view('jenis-anggota.index', compact('jenisAnggota'));
    }

    public function create()
    {
        return view('jenis-anggota.create'); // Menampilkan form tambah jenis anggota
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jenis_anggota' => 'required|unique:jenis_anggotas,kode_jenis_anggota|max:2',
            'jns_anggota' => 'required|unique:jenis_anggotas,jns_anggota|max:15',
            'max_pinjam' => 'required|integer|min:1|max:99999',
            'keterangan' => 'nullable|string|max:50',
        ]);

        JenisAnggota::create($request->all());

        return redirect()->route('jenis-anggota.index')->with('success', 'Jenis Anggota berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $jenisAnggota = JenisAnggota::findOrFail($id); // Mengambil data berdasarkan ID
        return view('jenis-anggota.show', compact('jenisAnggota'));
    }

    public function edit(string $id)
    {
        $jenisAnggota = JenisAnggota::findOrFail($id); // Mengambil data berdasarkan ID
        return view('jenis-anggota.edit', compact('jenisAnggota'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_jenis_anggota' => 'required|unique:jenis_anggotas,kode_jenis_anggota,' . $id . ',id|max:2',
            'jns_anggota' => 'required|unique:jenis_anggotas,jns_anggota,' . $id . ',id|max:15',
            'max_pinjam' => 'required|integer|min:1|max:99999',
            'keterangan' => 'nullable|string|max:50',
        ]);

        $jenisAnggota = JenisAnggota::findOrFail($id);
        $jenisAnggota->update($request->all());

        return redirect()->route('jenis-anggota.index')->with('success', 'Jenis Anggota berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $jenisAnggota = JenisAnggota::findOrFail($id);
        $jenisAnggota->delete();

        return redirect()->route('jenis-anggota.index')->with('success', 'Jenis Anggota berhasil dihapus.');
    }
}
