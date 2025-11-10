<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::paginate(10);
        return view('obatAdmin.obatAdmin_index', compact('obat'));
    }

    public function create()
    {
        return view('obatAdmin.obatAdmin_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'dosis' => 'required',
            'exp' => 'required',
            'stok' => 'required|numeric',
        ]);

        Obat::create($request->all());

        return redirect()->route('obatAdmin.index')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obatAdmin.obatAdmin_edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'nama_obat' => 'required',
        'dosis' => 'required',
        'exp' => 'required',
        'stok' => 'required|numeric',
    ]);

    $obat = Obat::findOrFail($id);
    $obat->update($request->all());

    return redirect()->route('obatAdmin.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Obat::findOrFail($id)->delete();
        return redirect()->route('obatAdmin.index')->with('success', 'Data obat berhasil dihapus.');
    }
}
