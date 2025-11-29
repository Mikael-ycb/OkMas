<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::paginate(10);
        return view('dokterAdmin.dokterAdmin_index', compact('dokter'));
    }

    public function create()
    {
        return view('dokterAdmin.dokterAdmin_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'id_dokter' => 'required|unique:dokter',
            'klaster_id' => 'required',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokterAdmin.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokterAdmin.dokterAdmin_edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'id_dokter' => 'required',
            'klaster_id' => 'required',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('dokterAdmin.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Dokter::findOrFail($id)->delete();
        return redirect()->route('dokterAdmin.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}
