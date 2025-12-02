<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\NotifikasiPasien;
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

        // 🔥 tandai notif berita ini sebagai dibaca oleh pasien yang login
        if (auth()->check()) {
            NotifikasiPasien::where('berita_id', $id)
                ->where(function ($query) {
                    $query->where('pasien_id', auth()->id())  // notif personal
                          ->orWhereNull('pasien_id');         // notif global
                })
                ->update(['is_read' => true]);
        }

        return view('beritaDetail', compact('berita'));
    }

}
