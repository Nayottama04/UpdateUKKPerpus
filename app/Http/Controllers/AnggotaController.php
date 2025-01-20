<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\JenisAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = DB::table('anggotas')
            ->join('jenis_anggotas', 'anggotas.jenis_anggota_id', '=', 'jenis_anggotas.id') // Contoh relasi
            ->select('anggotas.*', 'jenis_anggotas.jns_anggota') // Menambahkan kolom dari tabel relasi
            ->get();
        // dd($anggota);
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        $jenisAnggota = JenisAnggota::all(); // Mengambil semua data jenis anggota untuk dropdown
        return view('anggota.create', compact('jenisAnggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_anggota_id' => 'required|exists:jenis_anggotas,id',
            'kode_anggota' => 'required|unique:anggotas,kode_anggota|max:20',
            'nama_anggota' => 'required|unique:anggotas,nama_anggota|max:255',
            'tempat' => 'required|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'tgl_daftar' => 'required|date',
            'masa_aktif' => 'required|date|after:tgl_daftar',
            'fa' => 'required|in:Y,T',
            'keterangan' => 'nullable|string|max:45',
            'foto' => 'nullable',
            'username' => 'required|unique:anggotas,username|max:50',
            'password' => 'required|max:50',
        ]);

        $anggotaData = $request->all();

        // Jika ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            $anggotaData['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        Anggota::create($anggotaData);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $anggota = Anggota::with('jenisAnggota')->findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    public function edit(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $jenisAnggota = JenisAnggota::all(); // Mengambil semua data jenis anggota
        return view('anggota.edit', compact('anggota', 'jenisAnggota'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_anggota_id' => 'required|exists:jenis_anggotas,id',
            'kode_anggota' => 'required|unique:anggotas,kode_anggota,' . $id . ',id|max:20',
            'nama_anggota' => 'required|unique:anggotas,nama_anggota,' . $id . ',id|max:255',
            'tempat' => 'required|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'tgl_daftar' => 'required|date',
            'masa_aktif' => 'required|date|after:tgl_daftar',
            'fa' => 'required|in:Y,T',
            'keterangan' => 'nullable|string|max:45',
            'foto' => 'nullable',
            'username' => 'required|unique:anggotas,username,' . $id . ',id|max:50',
            'password' => 'required|max:50',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggotaData = $request->all();

        // Jika ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            $anggotaData['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        $anggota->update($anggotaData);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
