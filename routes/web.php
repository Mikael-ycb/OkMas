<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PeriksaController;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/tentangKami', function () {
    return view('tentangKami' , ['title' => 'Tentang Kami']);
});

Route::get('/layanan', function () {
    return view('layanan', ['title' => 'Layanan']);
});

Route::get('/dokter', function () {
    return view('dokter', ['title' => 'Dokter']);
});

Route::get('/berita', function () {
    return view('berita', ['title' => 'Berita']);
});

Route::get('/kontak', function () {
    return view('kontak', ['title' => 'Kontak']);
});

Route::get('/janjiTemu', [JanjiTemuController::class, 'index'])->name('janjiTemu.index');
Route::post('/janjiTemu', [JanjiTemuController::class, 'store'])->name('janjiTemu.store');
Route::get('/janjiTemu/{id}/edit', [JanjiTemuController::class, 'edit'])->name('janjiTemu.edit');
Route::put('/janjiTemu/{id}', [JanjiTemuController::class, 'update'])->name('janjiTemu.update');
Route::delete('/janjiTemu/{id}', [JanjiTemuController::class, 'destroy'])->name('janjiTemu.destroy');

Route::get('/notifikasi', function () {
    return view('notifikasi', ['title' => 'notifikasi']);
});

Route::get('/laporan', function () {
    return view('laporan', ['title' => 'laporan']);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('laporanAdmin')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('laporanAdmin.index');
    Route::get('/{nik}', [LaporanController::class, 'show'])->name('laporanAdmin.show');
    Route::get('/edit/{id}', [LaporanController::class, 'edit'])->name('laporanAdmin.edit');
    Route::post('/update/{id}', [LaporanController::class, 'update'])->name('laporanAdmin.update');
    Route::delete('/delete/{id}', [LaporanController::class, 'destroy'])->name('laporanAdmin.destroy');
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