<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use App\Models\Ddc;
use App\Models\Format;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;

class PustakaController extends Controller
{
    public function index()
    {
        $pustakas = Pustaka::with(['ddc', 'format', 'penerbit', 'pengarang'])->get();
        return view('pustaka.index', compact('pustakas'));
    }

    public function create()
    {
        $ddcs = Ddc::all();
        $formats = Format::all();
        $penerbits = Penerbit::all();
        $pengarangs = Pengarang::all();
        return view('pustaka.create', compact('ddcs', 'formats', 'penerbits', 'pengarangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pustaka' => 'required|integer',
            'ddc_id' => 'required|exists:ddcs,id',
            'format_id' => 'required|exists:formats,id',
            'penerbit_id' => 'required|exists:penerbits,id',
            'pengarang_id' => 'required|exists:pengarangs,id',
            'isbn' => 'required|max:20',
            'judul_pustaka' => 'required|max:100',
            'tahun_terbit' => 'required|max:5',
            'keyword' => 'nullable|max:50',
            'keterangan_fisik' => 'nullable|max:100',
            'keterangan_tambahan' => 'nullable|max:100',
            'abstraksi' => 'nullable',
            'gambar' => 'nullable|file',
            'harga_buku' => 'required|integer',
            'kondisi_buku' => 'required|max:15',
            'rp' => 'required|in:0,1',
            'jml_pinjam' => 'required|integer',
            'denda_terlambat' => 'required|integer',
            'denda_hilang' => 'required|integer',
        ]);

        $pustakaData = $request->all();

        if ($request->hasFile('gambar')) {
            $pustakaData['gambar'] = $request->file('gambar')->store('pustaka', 'public');
        }

        Pustaka::create($pustakaData);

        return redirect()->route('pustaka.index')->with('success', 'Pustaka berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $pustaka = Pustaka::with(['ddc', 'format', 'penerbit', 'pengarang'])->findOrFail($id);
        return view('pustaka.show', compact('pustaka'));
    }

    public function edit(string $id)
    {
        $pustaka = Pustaka::findOrFail($id);
        $ddcs = Ddc::all();
        $formats = Format::all();
        $penerbits = Penerbit::all();
        $pengarangs = Pengarang::all();
        return view('pustaka.edit', compact('pustaka', 'ddcs', 'formats', 'penerbits', 'pengarangs'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pustaka' => 'required|integer',
            'ddc_id' => 'required|exists:ddcs,id',
            'format_id' => 'required|exists:formats,id',
            'penerbit_id' => 'required|exists:penerbits,id',
            'pengarang_id' => 'required|exists:pengarangs,id',
            'isbn' => 'required|max:20',
            'judul_pustaka' => 'required|max:100',
            'tahun_terbit' => 'required|max:5',
            'keyword' => 'nullable|max:50',
            'keterangan_fisik' => 'nullable|max:100',
            'keterangan_tambahan' => 'nullable|max:100',
            'abstraksi' => 'nullable',
            'gambar' => 'nullable|file',


            'harga_buku' => 'required|integer',
            'kondisi_buku' => 'required|max:15',
            'rp' => 'required|in:0,1',
            'jml_pinjam' => 'required|integer',
            'denda_terlambat' => 'required|integer',
            'denda_hilang' => 'required|integer',
        ]);

        $pustaka = Pustaka::findOrFail($id);
        $pustakaData = $request->all();

        if ($request->hasFile('gambar')) {
            $pustakaData['gambar'] = $request->file('gambar')->store('pustaka', 'public');
        }

        $pustaka->update($pustakaData);

        return redirect()->route('pustaka.index')->with('success', 'Pustaka berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $pustaka = Pustaka::findOrFail($id);
        $pustaka->delete();

        return redirect()->route('pustaka.index')->with('success', 'Pustaka berhasil dihapus.');
    }
}


