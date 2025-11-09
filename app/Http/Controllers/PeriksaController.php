<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use Carbon\Carbon;

class PeriksaController extends Controller
{
    // ✅ Tampilkan daftar periksa (index + AJAX)
    public function index(Request $request)
    {
        $tanggal = $request->get('tanggal', Carbon::now()->format('Y-m-d'));
        $klaster = $request->get('klaster', 'Umum');

        $data = Periksa::whereDate('tanggal_periksa', $tanggal)
            ->where('klaster', $klaster)
            ->orderBy('id', 'asc')
            ->paginate(8);

        $total = Periksa::count();
        $aktif = Periksa::where('status', 'Aktif')->count();
        $nonaktif = Periksa::where('status', 'Tidak Aktif')->count();

        // Jika request dari AJAX → kirim partial table saja
        if ($request->ajax()) {
            return view('daftarPeriksaAdmin.daftarPeriksaAdmin_partial_table', compact('data'))->render();
        }

        return view('daftarPeriksaAdmin.daftarPeriksaAdmin_index', compact(
            'data', 'tanggal', 'klaster', 'total', 'aktif', 'nonaktif'
        ));
    }

    // ✅ Update status aktif / tidak aktif via AJAX
    public function toggleStatus($id)
    {
        $pasien = Periksa::findOrFail($id);
        $pasien->status = $pasien->status === 'Aktif' ? 'Tidak Aktif' : 'Aktif';
        $pasien->save();

        return response()->json(['success' => true, 'status' => $pasien->status]);
    }

    // ✅ Halaman edit data pasien
    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        return view('daftarPeriksaAdmin.daftarPeriksaAdmin_edit', compact('periksa'));
    }

    // ✅ Update data pasien
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'klaster' => 'required|string',
            'tanggal_periksa' => 'required|date',
            'status' => 'required|string',
        ]);

        $periksa = Periksa::findOrFail($id);
        $periksa->update($request->all());

        return redirect()->route('periksa.index')->with('success', 'Data pasien berhasil diperbarui.');
    }
}
