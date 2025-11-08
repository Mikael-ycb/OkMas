<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Halaman utama daftar semua laporan pasien.
     */
    public function index()
    {
        // ambil semua laporan, dengan pagination 7 data per halaman
        $laporan = Laporan::orderBy('updated_at', 'desc')->paginate(7);

        return view('laporanAdmin.index', compact('laporan'));
    }

    /**
     * Halaman detail laporan per pasien.
     * Tampilkan daftar pemeriksaan pasien berdasarkan NIK atau nama.
     */
    public function show($nik)
    {
        // ambil nama pasien
        $nama_pasien = Laporan::where('nik', $nik)->value('nama_pasien');

        // ambil semua laporan pasien tsb dengan pagination
        $pasien = Laporan::where('nik', $nik)
            ->orderBy('tanggal', 'desc')
            ->paginate(6);

        return view('laporanAdmin.detail', compact('pasien', 'nama_pasien'));
    }

    /**
     * Halaman form edit laporan.
     */
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('laporanAdmin.edit', compact('laporan'));
    }

    /**
     * Proses update laporan.
     */
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->update([
            'anamnesis' => $request->anamnesis,
            'tekanan_darah' => $request->tekanan_darah,
            'riwayat_penyakit_sekarang' => $request->riwayat_penyakit_sekarang,
            'riwayat_penyakit_dahulu' => $request->riwayat_penyakit_dahulu,
            'riwayat_penyakit_keluarga' => $request->riwayat_penyakit_keluarga,
            'riwayat_kebiasaan' => $request->riwayat_kebiasaan,
            'anamnesis_organ' => $request->anamnesis_organ,
        ]);

        return redirect()
            ->route('laporanAdmin.show', $laporan->nik)
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * (Optional) Hapus laporan
     */
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}
