<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JanjiTemu;
use App\Models\Periksa;
use Carbon\Carbon;

class PeriksaController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->get('tanggal', now()->format('Y-m-d'));
        $klaster = $request->get('klaster', 'Umum');

        $data = Periksa::where('tanggal_periksa', 'LIKE', $tanggal . '%')
            ->when($klaster != 'Semua', function ($query) use ($klaster) {
                $query->where('klaster', $klaster);
            })
            ->orderBy('id', 'asc')
            ->paginate(8);

        if ($request->ajax()) {
            return view('daftarPeriksaAdmin.daftarPeriksaAdmin_partial_table', compact('data'))->render();
        }

        return view('daftarPeriksaAdmin.daftarPeriksaAdmin_index', compact('data', 'tanggal', 'klaster'));
    }


    public function toggleStatus($id)
    {
        $janji = JanjiTemu::findOrFail($id);

        $janji->status = $janji->status == 'Aktif' ? 'Tidak Aktif' : 'Aktif';
        $janji->save();

        return response()->json(['success' => true, 'status' => $janji->status]);
    }

    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        return view('daftarPeriksaAdmin.daftarPeriksaAdmin_edit', compact('periksa'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'keluhan' => 'required|string',
            'status' => 'required|string'
        ]);

        $janji = JanjiTemu::findOrFail($id);
        $janji->update($request->all());

        return redirect()->route('periksa.index')->with('success', 'Data berhasil diperbarui.');
    }
}
