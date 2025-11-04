<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Tanggal;
use App\Models\Klaster;
use App\Models\JanjiTemu;

class JanjiTemuController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        $tanggals = Tanggal::all();
        $klasters = Klaster::all();
        $janjiTemus = JanjiTemu::with(['dokter', 'tanggal', 'klaster'])->latest()->get();

        return view('janjiTemu', compact('dokters', 'tanggals', 'klasters', 'janjiTemus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_id' => 'required',
            'klaster_id' => 'required',
            'dokter_id' => 'required',
            'keluhan' => 'required|string',
        ]);

        JanjiTemu::create($request->all());

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
}
