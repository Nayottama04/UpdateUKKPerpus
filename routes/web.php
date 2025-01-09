<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\{
    PerpustakaanController,
    RakController,
    DdcController,
    FormatController,
    JenisAnggotaController,
    AnggotaController,
    PenerbitController,
    PengarangController,
    PustakaController,
    TransaksiController
};
use App\Http\Controllers\Auth\LoginController;


// Halaman awal login
Route::get('/', function () {
    return view('auth.login');
});


Route::post('/proseslogin', [LoginController::class, 'login'])->name('login.post');

// Semua resource controller
Route::resource('perpustakaan', PerpustakaanController::class);
Route::resource('rak', RakController::class); // Menambahkan resource untuk Rak
Route::resource('ddc', DdcController::class);
Route::resource('format', FormatController::class);
Route::resource('jenis-anggota', JenisAnggotaController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('pengarang', PengarangController::class);
Route::resource('pustaka', PustakaController::class);
Route::resource('transaksi', TransaksiController::class);


/*------------------------------------------
All Normal Users Routes List
--------------------------------------------*/
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
All Manager Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
