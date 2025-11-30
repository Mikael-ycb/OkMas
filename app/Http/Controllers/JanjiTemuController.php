<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Periksa;
use App\Models\Tanggal;
use App\Models\Klaster;
use App\Models\JanjiTemu;
use Illuminate\Support\Facades\Auth;


class JanjiTemuController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        $tanggals = Tanggal::all();
        $klasters = Klaster::all();
        $janjiTemus = JanjiTemu::with(['dokter', 'tanggal', 'klaster'])
            ->where('id_akun', Auth::id())
            ->latest()
            ->get();

        return view('janjiTemu', compact('dokters', 'tanggals', 'klasters', 'janjiTemus'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'tanggal_id' => 'required|exists:tanggals,id',
            'klaster_id' => 'required|exists:klasters,id',
            'dokter_id'  => 'required|exists:dokters,id',
            'keluhan'    => 'required|string',
        ]);

        $lastQueue = JanjiTemu::where('tanggal_id', $request->tanggal_id)
            ->where('dokter_id', $request->dokter_id)
            ->orderBy('nomor_antrian', 'desc')
            ->first();

        $nomor_antrian = $lastQueue ? $lastQueue->nomor_antrian + 1 : 1;

        $janjiTemu = JanjiTemu::create([
            'id_akun' => Auth::id(),
            'tanggal_id' => $request->tanggal_id,
            'klaster_id' => $request->klaster_id,
            'dokter_id'  => $request->dokter_id,
            'keluhan'    => $request->keluhan,
            'nomor_antrian' => $nomor_antrian,
        ]);

        $janjiTemu->refresh();

        Periksa::create([
            'janji_temu_id' => $janjiTemu->id,
            'nama_pasien' => Auth::user()->nama ?? 'Nama Tidak Ditemukan',
            'klaster' => $janjiTemu->klaster->nama ?? 'Tidak diketahui',
            'tanggal_periksa' => $janjiTemu->tanggal->tanggal ?? now(),
            'status' => 'Aktif',
        ]);


        return redirect()->route('janjiTemu.index')->with('success', 'Janji temu berhasil dibuat!');
    }


    public function edit($id)
    {
        $janji = JanjiTemu::findOrFail($id);
        $tanggals = \App\Models\Tanggal::all();
        $klasters = \App\Models\Klaster::all();
        $dokters = \App\Models\Dokter::all();

        return view('janjiTemu.edit', compact('janji', 'tanggals', 'klasters', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_id' => 'required',
            'klaster_id' => 'required',
            'dokter_id' => 'required',
            'keluhan' => 'required|string|max:255',
        ]);

        $janji = JanjiTemu::findOrFail($id);
        $janji->update($request->all());

        return redirect()->route('janjiTemu.index')->with('success', 'Janji temu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $janji = JanjiTemu::findOrFail($id);
        $janji->delete();

        return redirect()->route('janjiTemu.index')->with('success', 'Janji temu berhasil dibatalkan.');
    }

    public function riwayat()
    {
        $riwayat = JanjiTemu::with(['dokter', 'tanggal', 'klaster'])
            ->where('id_akun', Auth::id())
            ->orderBy('tanggal_id', 'desc')
            ->get();

        return view('laporan', compact('riwayat'));
    }
}
