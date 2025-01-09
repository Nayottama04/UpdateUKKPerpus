<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpustakaan = Perpustakaan::all(); // Mengambil semua data perpustakaan
        return view('perpustakaan.index', compact('perpustakaan')); // Mengirimkan data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perpustakaan.create'); // Menampilkan form untuk membuat data baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_perpustakaan' => 'required|string|max:255',
            'nama_pustakawan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'website' => 'nullable|url|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]); 

        // Menyimpan data baru ke database
        // Perpustakaan::create([
        //     'nama_perpustakaan' => $request->nama_perpustakaan,
        //     'nama_pustakawan' => $request->nama_pustakawan,
        //     'email' => $request->email,
        //     'alamat' => $request->alamat,
        //     'no_telp' => $request->no_telp,
        //     'website' => $request->website,
        //     'keterangan' => $request->keterangan,
        // ]);
        Perpustakaan::create($request->all());

        return redirect()->route('perpustakaan.index')->with('success', 'Perpustakaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id); // Menampilkan data berdasarkan ID
        return view('perpustakaan.show', compact('perpustakaan')); // Mengirimkan data ke view show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id); // Menampilkan data yang ingin diedit
        return view('perpustakaan.edit', compact('perpustakaan')); // Mengirimkan data ke form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data input
        $request->validate([
            'nama_perpustakaan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'website' => 'nullable|url|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Mengupdate data berdasarkan ID
        $perpustakaan = Perpustakaan::findOrFail($id);
        $perpustakaan->update([
            'nama_perpustakaan' => $request->nama_perpustakaan,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'website' => $request->website,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('perpustakaan.index')->with('success', 'Perpustakaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus data berdasarkan ID
        $perpustakaan = Perpustakaan::findOrFail($id);
        $perpustakaan->delete();

        return redirect()->route('perpustakaan.index')->with('success', 'Perpustakaan berhasil dihapus.');
    }
}
