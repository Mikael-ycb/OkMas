<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaPasienController extends Controller
{
    public function index()
    {
        // list berita untuk halaman /berita
        $berita = Berita::orderBy('tanggal', 'desc')->get();

        return view('berita', compact('berita'));
    }

    public function show($id)
    {
        // detail satu berita untuk /berita/{id}
        $berita = Berita::findOrFail($id);

        return view('beritaDetail', compact('berita'));
    }
}
