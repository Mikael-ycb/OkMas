<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/janjiTemu', function () {
    return view('janjiTemu', ['title' => 'janjiTemu']);
});

Route::get('/notifikasi', function () {
    return view('notifikasi', ['title' => 'notifikasi']);
});

Route::get('/laporan', function () {
    return view('laporan', ['title' => 'laporan']);
});