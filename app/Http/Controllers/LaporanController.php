<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    // Daftar semua pasien (unik per NIK)
    public function index()
{
    $laporan = \App\Models\Laporan::select('nama_pasien', 'nik', \DB::raw('MAX(id) as id'), \DB::raw('MAX(updated_at) as updated_at'))
        ->groupBy('nama_pasien', 'nik')
        ->orderByRaw('MAX(updated_at) DESC')
        ->paginate(7);

    return view('laporanAdmin.index', compact('laporan'));
}


    // Halaman list laporan per pasien (by NIK)
    public function show($nik)
    {
        $nama_pasien = Laporan::where('nik', $nik)->value('nama_pasien');

        $pasien = Laporan::where('nik', $nik)
            ->orderBy('tanggal', 'desc')
            ->paginate(6);

        return view('laporanAdmin.detail', compact('pasien', 'nama_pasien'));
    }

    // Form tambah laporan
    public function create()
    {
        return view('laporanAdmin.create');
    }

    // Simpan laporan
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien'        => 'required|string',
            'nik'                => 'required|string',
            'tanggal'            => 'nullable|date',
            'jenis_pemeriksaan'  => 'required|string',
            'hasil_pemeriksaan'  => 'nullable|string',
            // Field klinis opsional (jika sudah ada di migration)
            'anamnesis'                    => 'nullable|string',
            'tekanan_darah'                => 'nullable|string',
            'riwayat_penyakit_sekarang'   => 'nullable|string',
            'riwayat_penyakit_dahulu'     => 'nullable|string',
            'riwayat_penyakit_keluarga'   => 'nullable|string',
            'riwayat_kebiasaan'           => 'nullable|string',
            'anamnesis_organ'             => 'nullable|string',
        ]);

        Laporan::create([
            'nama_pasien'        => $request->nama_pasien,
            'nik'                => $request->nik,
            'tanggal'            => $request->tanggal ? Carbon::parse($request->tanggal) : now(),
            'jenis_pemeriksaan'  => $request->jenis_pemeriksaan,
            'hasil_pemeriksaan'  => $request->hasil_pemeriksaan,

            'anamnesis'                    => $request->anamnesis,
            'tekanan_darah'                => $request->tekanan_darah,
            'riwayat_penyakit_sekarang'   => $request->riwayat_penyakit_sekarang,
            'riwayat_penyakit_dahulu'     => $request->riwayat_penyakit_dahulu,
            'riwayat_penyakit_keluarga'   => $request->riwayat_penyakit_keluarga,
            'riwayat_kebiasaan'           => $request->riwayat_kebiasaan,
            'anamnesis_organ'             => $request->anamnesis_organ,
        ]);

        return redirect()->route('laporanAdmin.index')->with('success', 'Laporan baru berhasil ditambahkan!');
    }

    // Form edit laporan
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporanAdmin.edit', compact('laporan'));
    }

    // Update laporan
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $request->validate([
            'tanggal'            => 'nullable|date',
            'jenis_pemeriksaan'  => 'required|string',
            'hasil_pemeriksaan'  => 'nullable|string',
            'anamnesis'                    => 'nullable|string',
            'tekanan_darah'                => 'nullable|string',
            'riwayat_penyakit_sekarang'   => 'nullable|string',
            'riwayat_penyakit_dahulu'     => 'nullable|string',
            'riwayat_penyakit_keluarga'   => 'nullable|string',
            'riwayat_kebiasaan'           => 'nullable|string',
            'anamnesis_organ'             => 'nullable|string',
        ]);

        $laporan->update([
            'tanggal'            => $request->tanggal ? Carbon::parse($request->tanggal) : $laporan->tanggal,
            'jenis_pemeriksaan'  => $request->jenis_pemeriksaan,
            'hasil_pemeriksaan'  => $request->hasil_pemeriksaan,

            'anamnesis'                    => $request->anamnesis,
            'tekanan_darah'                => $request->tekanan_darah,
            'riwayat_penyakit_sekarang'   => $request->riwayat_penyakit_sekarang,
            'riwayat_penyakit_dahulu'     => $request->riwayat_penyakit_dahulu,
            'riwayat_penyakit_keluarga'   => $request->riwayat_penyakit_keluarga,
            'riwayat_kebiasaan'           => $request->riwayat_kebiasaan,
            'anamnesis_organ'             => $request->anamnesis_organ,
        ]);

        return redirect()
            ->route('laporanAdmin.show', $laporan->nik)
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    // Hapus laporan
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}
