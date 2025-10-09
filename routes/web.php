<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tentangKami', function () {
    return view('tentangKami');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/dokter', function () {
    return view('dokter');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/kontak', function () {
    return view('kontak');
});
