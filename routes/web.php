<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\AkunPasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\BeritaPasienController;
use App\Http\Controllers\KlasterController;
use App\Http\Controllers\ResepObatController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
})->name('home');

Route::get('/tentangKami', function () {
    return view('tentangKami', ['title' => 'Tentang Kami']);
});

Route::get('/detailKlaster/{jenis}', [KlasterController::class, 'detail'])->name('detailKlaster');


Route::get('/layanan', function () {
    return view('layanan', ['title' => 'Layanan']);
});

Route::get('/dokter', function () {
    return view('dokter', ['title' => 'Dokter']);
});

//Route::get('/berita', function () {
//  return view('berita', ['title' => 'Berita']);
//});

Route::get('/berita', [BeritaPasienController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaPasienController::class, 'show'])
    ->name('beritaDetail');

Route::get('/kontak', function () {
    return view('kontak', ['title' => 'Kontak']);
});

Route::middleware('auth')->group(function () {
    Route::get('/janjiTemu', [JanjiTemuController::class, 'index'])->name('janjiTemu.index');
    Route::post('/janjiTemu', [JanjiTemuController::class, 'store'])->name('janjiTemu.store');
    Route::get('/janjiTemu/{id}/edit', [JanjiTemuController::class, 'edit'])->name('janjiTemu.edit');
    Route::put('/janjiTemu/{id}', [JanjiTemuController::class, 'update'])->name('janjiTemu.update');
    Route::delete('/janjiTemu/{id}', [JanjiTemuController::class, 'destroy'])->name('janjiTemu.destroy');
});

Route::get('/notifikasi', function () {
    return view('notifikasi', ['title' => 'notifikasi']);
});

Route::get('/laporan', [JanjiTemuController::class, 'riwayat'])
    ->name('laporan')
    ->middleware('auth');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('laporanAdmin')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('laporanAdmin.index');
    Route::get('/create', [LaporanController::class, 'create'])->name('laporanAdmin.create');
    Route::post('/store', [LaporanController::class, 'store'])->name('laporanAdmin.store');
    Route::get('/{id_akun}', [LaporanController::class, 'show'])->name('laporanAdmin.show');
    Route::get('/edit/{id_akun}', [LaporanController::class, 'edit'])->name('laporanAdmin.edit');
    Route::put('/update/{id_akun}', [LaporanController::class, 'update'])->name('laporanAdmin.update');
    Route::delete('/delete/{id_akun}', [LaporanController::class, 'destroy'])->name('laporanAdmin.destroy');
});

Route::prefix('updateBeritaAdmin')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/update/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::get('/show/{id}', [BeritaController::class, 'show'])->name('berita.show');
    Route::delete('/delete/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});

Route::prefix('daftarPeriksaAdmin')->group(function () {
    Route::get('/', [PeriksaController::class, 'index'])->name('periksa.index');
    Route::post('/toggle-status/{id}', [PeriksaController::class, 'toggleStatus'])->name('periksa.toggle');

    Route::get('/{id}/edit', [PeriksaController::class, 'edit'])->name('periksa.edit');
    Route::put('/{id}', [PeriksaController::class, 'update'])->name('periksa.update');
});

Route::prefix('akunPasienAdmin')->group(function () {
    Route::get('/', [AkunPasienController::class, 'index'])->name('akunPasienAdmin.index');
    Route::get('/create', [AkunPasienController::class, 'create'])->name('akunPasienAdmin.create');
    Route::post('/store', [AkunPasienController::class, 'store'])->name('akunPasienAdmin.store');
    Route::get('/edit/{id}', [AkunPasienController::class, 'edit'])->name('akunPasienAdmin.edit');
    Route::post('/update/{id}', [AkunPasienController::class, 'update'])->name('akunPasienAdmin.update');
    Route::delete('/{id}', [AkunPasienController::class, 'destroy'])->name('akunPasienAdmin.destroy');
});

Route::prefix('obatAdmin')->group(function () {
    Route::get('/', [ObatController::class, 'index'])->name('obatAdmin.index');
    Route::get('/create', [ObatController::class, 'create'])->name('obatAdmin.create');
    Route::post('/store', [ObatController::class, 'store'])->name('obatAdmin.store');
    Route::get('/edit/{id}', [ObatController::class, 'edit'])->name('obatAdmin.edit');
    Route::post('/update/{id}', [ObatController::class, 'update'])->name('obatAdmin.update');
    Route::delete('/{id}', [ObatController::class, 'destroy'])->name('obatAdmin.destroy');
});

Route::prefix('dokterAdmin')->group(function () {
    Route::get('/', [DokterController::class, 'index'])->name('dokterAdmin.index');
    Route::get('/create', [DokterController::class, 'create'])->name('dokterAdmin.create');
    Route::post('/store', [DokterController::class, 'store'])->name('dokterAdmin.store');
    Route::get('/edit/{id}', [DokterController::class, 'edit'])->name('dokterAdmin.edit');
    Route::post('/update/{id}', [DokterController::class, 'update'])->name('dokterAdmin.update');
    Route::delete('/{id}', [DokterController::class, 'destroy'])->name('dokterAdmin.destroy');
});

Route::get('/get-dokter-by-klaster/{klaster_id}', function ($klaster_id) {
    // PERBAIKAN: Gunakan kolom 'klaster_id' (integer)
    return \App\Models\Dokter::where('klaster_id', $klaster_id)->get();

    // Catatan: Jika Anda telah menerapkan saran saya sebelumnya, ini bisa dipindahkan ke DokterController
});

Route::get('/resep', [ResepObatController::class, 'index'])->name('resep.index');
Route::get('/resep/create', [ResepObatController::class, 'create'])->name('resep.create');
Route::post('/resep', [ResepObatController::class, 'store'])->name('resep.store');
Route::get('/resep/{id}/edit', [ResepObatController::class, 'edit'])->name('resep.edit');
Route::put('/resep/{id}', [ResepObatController::class, 'update'])->name('resep.update');
Route::delete('/resep/{id}', [ResepObatController::class, 'destroy'])->name('resep.destroy');

