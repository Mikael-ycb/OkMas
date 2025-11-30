<?php

namespace App\Http\Controllers;

use App\Models\ResepObat;
use App\Models\Akun;
use App\Models\Obat;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    // 🔵 Tampil daftar semua resep
    public function index()
    {
        $resep = ResepObat::with(['pasien', 'obat'])->latest()->paginate(10);
        return view('resep.index', compact('resep'));
    }

    // 🔵 Form tambah resep
    public function create()
    {
        $pasien = Akun::where('role', 'pasien')->get();
        $obat = Obat::all();

        return view('resep.create', compact('pasien', 'obat'));
    }

    // 🔵 Proses tambah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pasien' => 'required',
            'id_obat' => 'required',
            'jumlah' => 'required|integer|min:1',
            'aturan_pakai' => 'required|string',
        ]);

        // UPDATE STOK OBAT
        $obat = Obat::find($request->id_obat);
        if ($obat->stok < $request->jumlah) {
            return back()->with('error', 'Stok obat tidak mencukupi!');
        }

        $obat->stok -= $request->jumlah;
        $obat->save();

        $validated['tanggal_resep'] = now();

        ResepObat::create($validated);

        return redirect()->route('resep.index')->with('success', 'Resep berhasil dibuat!');
    }

    // 🔵 Edit resep
    public function edit($id)
    {
        $resep = ResepObat::findOrFail($id);
        $pasien = Akun::where('role', 'pasien')->get();
        $obat = Obat::all();

        return view('resep.edit', compact('resep', 'pasien', 'obat'));
    }

    // 🔵 Update resep
    public function update(Request $request, $id)
    {
        $resep = ResepObat::findOrFail($id);

        $validated = $request->validate([
            'id_pasien' => 'required',
            'id_obat' => 'required',
            'jumlah' => 'required|integer|min:1',
            'aturan_pakai' => 'required|string',
        ]);

        $resep->update($validated);

        return redirect()->route('resep.index')->with('success', 'Resep berhasil diperbarui!');
    }

    // 🔵 Hapus resep
    public function destroy($id)
    {
        ResepObat::destroy($id);
        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus!');
    }
}
