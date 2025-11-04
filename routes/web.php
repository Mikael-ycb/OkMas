<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JanjiTemuController;


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