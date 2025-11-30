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

        $data = Periksa::where('status', 'Aktif')
            ->when($klaster != 'Semua', function ($query) use ($klaster) {
                $query->where('klaster', $klaster);
            })
            ->where('tanggal_periksa', 'LIKE', $tanggal . '%')
            ->orderBy('id', 'asc')
            ->paginate(8);

        if ($request->ajax()) {
            return view('daftarPeriksaAdmin.daftarPeriksaAdmin_partial_table', compact('data'))->render();
        }

        return view('daftarPeriksaAdmin.daftarPeriksaAdmin_index', compact('data', 'tanggal', 'klaster'));
    }


    public function toggleStatus($id)
    {
        $periksa = Periksa::findOrFail($id);

        if ($periksa->status == 'Aktif') {
            $periksa->status = 'Tidak Aktif'; // pasien selesai
            $periksa->save();
            
        }

        return response()->json(['success' => true, 'status' => $periksa->status]);
    }


    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        return view('daftarPeriksaAdmin.daftarPeriksaAdmin_edit', compact('periksa'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'klaster' => 'required|string|max:255',
            'tanggal_periksa' => 'required|date',
            'status' => 'required|string'
        ]);

        $periksa = Periksa::findOrFail($id);

        $periksa->update([
            'nama_pasien' => $request->nama_pasien,
            'klaster' => $request->klaster,
            'tanggal_periksa' => $request->tanggal_periksa,
            'status' => $request->status,
        ]);

        return redirect()->route('periksa.index')->with('success', 'Data berhasil diperbarui.');
    }
}
