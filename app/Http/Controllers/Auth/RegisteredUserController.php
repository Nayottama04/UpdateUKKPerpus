<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Anggota;
use App\Models\JenisAnggota;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tempat' => ['required', 'string', 'max:20'],
            'tgl_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string', 'max:50'],
            'no_telp' => ['required', 'string', 'max:15'],
        ]);

        // Buat user di tabel `users`
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Ambil jenis anggota default
        $jenisAnggota = JenisAnggota::first(); // Ambil jenis anggota pertama yang ada

        // Buat anggota di tabel `anggotas`
        Anggota::create([
            'jenis_anggota_id' => $jenisAnggota->id ?? 1, // Default jika tidak ada jenis anggota
            'kode_anggota' => 'AGT-' . strtoupper(substr($request->name, 0, 3)) . rand(100, 999),
            'nama_anggota' => $request->name,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'tgl_daftar' => Carbon::now(),
            'masa_aktif' => Carbon::now()->addYear(),
            'fa' => 'T',
            'keterangan' => 'Anggota baru',
            'username' => $request->email, // Bisa gunakan email sebagai username
            'password' => substr(Hash::make($request->password), 0, 50), // Truncate password agar sesuai dengan kolom
        ]);
        

        event(new Registered($user));

        Auth::login($user);
        
        // Arahkan ke halaman user setelah registrasi berhasil
        return redirect()->route('user.home');
    }
}
