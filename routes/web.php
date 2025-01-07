<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PerpustakaanController, RakController, DdcController, FormatController,
    JenisAnggotaController, AnggotaController, PenerbitController,
    PengarangController, PustakaController, TransaksiController
};

Route::resource('perpustakaan', PerpustakaanController::class);
Route::resource('rak', RakController::class);
Route::resource('ddc', DdcController::class);
Route::resource('format', FormatController::class);
Route::resource('jenis-anggota', JenisAnggotaController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('pengarang', PengarangController::class);
Route::resource('pustaka', PustakaController::class);
Route::resource('transaksi', TransaksiController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
