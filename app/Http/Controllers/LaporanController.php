<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    // =============================
    // INDEX (List semua pasien unik)
    // =============================
    public function index()
{
    $laporan = Laporan::with('akun')
        ->whereIn('id', function ($query) {
            $query->select(\DB::raw('MAX(id)'))
                  ->from('laporan')
                  ->groupBy('id_akun');
        })
        ->paginate(10);

    return view('laporanAdmin.index', compact('laporan'));
}

    // =============================
    // DETAIL PER PASIEN
    // =============================
    public function show($id_akun)
    {
        $pasien = Akun::findOrFail($id_akun);

        $laporan = Laporan::where('id_akun', $id_akun)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('laporanAdmin.detail', compact('pasien', 'laporan'));
    }


    // =============================
    // FORM CREATE (2 kondisi)
    // =============================
    public function create(Request $request)
    {
        // Jika datang dari detail pasien → otomatis terisi
        if ($request->has('id_akun')) {
            $pasien = Akun::findOrFail($request->id_akun);
            return view('laporanAdmin.create', compact('pasien'));
        }

        // Jika dari index → admin pilih pasien
        $akun = Akun::where('role', 'pasien')->get();
        return view('laporanAdmin.create', compact('akun'));
    }


    // =============================
    // STORE
    // =============================
    public function store(Request $request)
{
    $validated = $request->validate([
        'id_akun' => 'required|exists:akun,id_akun',
        'tanggal' => 'nullable|date',
        'jenis_pemeriksaan' => 'required|string',
        'hasil_pemeriksaan' => 'nullable|string',
        'anamnesis' => 'nullable|string',
        'tekanan_darah' => 'nullable|string',
        'riwayat_penyakit_sekarang' => 'nullable|string',
        'riwayat_penyakit_dahulu' => 'nullable|string',
        'riwayat_penyakit_keluarga' => 'nullable|string',
        'riwayat_kebiasaan' => 'nullable|string',
        'anamnesis_organ' => 'nullable|string',
    ]);

    $akun = Akun::findOrFail($validated['id_akun']);

    Laporan::create([
        'id_akun' => $akun->id_akun,
        'nama_pasien' => $akun->nama,
        'nik' => $akun->nik,
        'tanggal' => $validated['tanggal'] ?? now(),
        'jenis_pemeriksaan' => $validated['jenis_pemeriksaan'],
        'hasil_pemeriksaan' => $validated['hasil_pemeriksaan'],
        'anamnesis' => $validated['anamnesis'],
        'tekanan_darah' => $validated['tekanan_darah'],
        'riwayat_penyakit_sekarang' => $validated['riwayat_penyakit_sekarang'],
        'riwayat_penyakit_dahulu' => $validated['riwayat_penyakit_dahulu'],
        'riwayat_penyakit_keluarga' => $validated['riwayat_penyakit_keluarga'],
        'riwayat_kebiasaan' => $validated['riwayat_kebiasaan'],
        'anamnesis_organ' => $validated['anamnesis_organ'],
    ]);

    return redirect()
        ->route('laporanAdmin.show', $akun->id_akun)
        ->with('success', 'Rekam medis berhasil ditambahkan!');
}



    // =============================
    // EDIT
    // =============================
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporanAdmin.edit', compact('laporan'));
    }


    // =============================
    // UPDATE
    // =============================
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $request->validate([
            'tanggal' => 'nullable|date',
            'jenis_pemeriksaan' => 'required|string',
            'hasil_pemeriksaan' => 'nullable|string',
            'anamnesis' => 'nullable|string',
            'tekanan_darah' => 'nullable|string',
            'riwayat_penyakit_sekarang' => 'nullable|string',
            'riwayat_penyakit_dahulu' => 'nullable|string',
            'riwayat_penyakit_keluarga' => 'nullable|string',
            'riwayat_kebiasaan' => 'nullable|string',
            'anamnesis_organ' => 'nullable|string',
        ]);

        $laporan->update($request->all());

        return redirect()
            ->route('laporanAdmin.show', $laporan->id_akun)
            ->with('success', 'Rekam medis berhasil diperbarui.');
    }


    // =============================
    // DESTROY
    // =============================
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $id_akun = $laporan->id_akun;

        $laporan->delete();

        return redirect()
            ->route('laporanAdmin.show', $id_akun)
            ->with('success', 'Rekam medis berhasil dihapus.');
    }
}
