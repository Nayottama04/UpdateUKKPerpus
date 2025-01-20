<?php

namespace App\Http\Controllers;

use App\Models\Ddc;
use App\Models\Rak;
use Illuminate\Http\Request;

class DdcController extends Controller
{
    public function index()
    {
        $ddcs = Ddc::with('rak')->get(); // Mengambil data DDC dengan relasi Rak
        return view('ddc.index', compact('ddcs'));
    }

    public function create()
    {
        $raks = Rak::all(); // Mengambil data rak untuk dropdown
        return view('ddc.create', compact('raks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rak_id' => 'required|exists:raks,id',
            'kode_ddc' => 'required|unique:ddcs,kode_ddc|max:10',
            'ddc' => 'required|unique:ddcs,ddc|max:50',
            'keterangan' => 'nullable|max:100',
        ]);

        Ddc::create($request->all());

        return redirect()->route('ddc.index')->with('success', 'DDC berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $ddc = Ddc::with('rak')->findOrFail($id);
        return view('ddc.show', compact('ddc'));
    }

    public function edit(string $id)
    {
        $ddc = Ddc::findOrFail($id);
        $raks = Rak::all(); // Mengambil data rak untuk dropdown
        return view('ddc.edit', compact('ddc', 'raks'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'rak_id' => 'required|exists:raks,id',
            'kode_ddc' => 'required|unique:ddcs,kode_ddc,' . $id . ',id|max:10',
            'ddc' => 'required|unique:ddcs,ddc,' . $id . ',id|max:50',
            'keterangan' => 'nullable|max:100',
        ]);

        $ddc = Ddc::findOrFail($id);
        $ddc->update($request->all());

        return redirect()->route('ddc.index')->with('success', 'DDC berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $ddc = Ddc::findOrFail($id);
        $ddc->delete();

        return redirect()->route('ddc.index')->with('success', 'DDC berhasil dihapus.');
    }
}
