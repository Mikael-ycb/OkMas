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

        $janjiTemus = JanjiTemu::with(['dokter','tanggal','klaster','periksa'])
            ->where('id_akun', Auth::user()->id_akun)
            ->whereHas('periksa', fn($q) => $q->where('status','Aktif'))
            ->get();

        return view('janjiTemu', compact('dokters','tanggals','klasters','janjiTemus'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tanggal_id' => 'required|exists:tanggals,id',
            'klaster_id' => 'required|exists:klasters,id',
            'dokter_id'  => 'required|exists:dokters,id',
            'keluhan'    => 'required|string',
        ]);

        // hitung antrian
        $no = (JanjiTemu::where('tanggal_id',$request->tanggal_id)
            ->where('dokter_id',$request->dokter_id)
            ->max('nomor_antrian')) + 1;

        // buat janji temu
        $janjiTemu = JanjiTemu::create([
            'id_akun' => Auth::user()->id_akun,
            'tanggal_id' => $request->tanggal_id,
            'klaster_id' => $request->klaster_id,
            'dokter_id' => $request->dokter_id,
            'keluhan' => $request->keluhan,
            'nomor_antrian' => $no,
        ]);

        // buat periksa otomatis
        Periksa::create([
            'id_akun' => Auth::user()->id_akun,
            'janji_temu_id' => $janjiTemu->id,
            'nama_pasien' => Auth::user()->nama,
            'klaster' => $janjiTemu->klaster->nama,
            'tanggal_periksa' => $janjiTemu->tanggal->tanggal,
            'status' => 'Aktif',
        ]);

        return redirect()->route('janjiTemu.index')
            ->with('success','Janji temu berhasil dibuat!');
    }


    public function edit($id)
    {
        $janji = JanjiTemu::findOrFail($id);
        return view('janjiTemu.edit', [
            'janji' => $janji,
            'tanggals' => Tanggal::all(),
            'klasters' => Klaster::all(),
            'dokters' => Dokter::all()
        ]);
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

        return redirect()->route('janjiTemu.index')
            ->with('success','Janji temu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        JanjiTemu::findOrFail($id)->delete();
        return redirect()->route('janjiTemu.index')
            ->with('success','Janji temu berhasil dibatalkan.');
    }
}
