<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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
    return view('auth.login');
});

    

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
