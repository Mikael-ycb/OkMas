<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiPasien;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(8);
        
        // Pre-calculate statistics for statistics cards
        $totalBerita = Berita::count();
        $beritaBulanIni = Berita::whereMonth('tanggal', \Carbon\Carbon::now()->month)
                                 ->whereYear('tanggal', \Carbon\Carbon::now()->year)
                                 ->count();
        $programUnik = Berita::distinct()->count('program');
        
        return view('updateBeritaAdmin.updateBeritaAdmin_index', compact('berita', 'totalBerita', 'beritaBulanIni', 'programUnik'));
    }

    public function create()
    {
        return view('updateBeritaAdmin.updateBeritaAdmin_edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'program' => 'nullable|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['tanggal'] = now();
        $berita = Berita::create($validated);

        NotifikasiPasien::create([
        'pasien_id' => null,              // null = tampil untuk semua pasien
        'berita_id' => $berita->id,
        'judul' => "Berita baru: " . $berita->judul,
    ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('updateBeritaAdmin.updateBeritaAdmin_edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'program' => 'nullable|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita = Berita::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::exists('public/' . $berita->gambar)) {
                Storage::delete('public/' . $berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('updateBeritaAdmin.updateBeritaAdmin_show', compact('berita'));
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && Storage::exists('public/' . $berita->gambar)) {
            Storage::delete('public/' . $berita->gambar);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
