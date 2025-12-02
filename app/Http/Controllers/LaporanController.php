<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    // ====================== INDEX ======================
    public function index()
    {
        $laporan = Laporan::with('akun')
            ->select('id_akun', \DB::raw('MAX(id) as id'), \DB::raw('MAX(updated_at) as updated_at'))
            ->groupBy('id_akun')
            ->paginate(7);

        return view('laporanAdmin.index', compact('laporan'));
    }

    // ====================== SHOW DETAIL PASIEN ======================
    public function show($id_akun)
    {
        $pasien = Akun::findOrFail($id_akun);

        $laporan = Laporan::where('id_akun', $id_akun)
            ->orderBy('tanggal', 'desc')
            ->paginate(6);

        return view('laporanAdmin.detail', compact('pasien', 'laporan'));
    }

    // ====================== CREATE ======================
    public function create(Request $request)
    {
        $akun = null;
        $janji_temu = null;

        if ($request->id_akun) {
            $akun = Akun::find($request->id_akun);
            // Ambil janji temu yang BELUM ada laporannya
            $janji_temu = $akun->janjiTemu()
                ->with(['tanggal', 'klaster', 'dokter'])
                ->whereDoesntHave('laporan')  // Hanya janji temu yang belum ada laporan
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $klaster = \App\Models\Klaster::all();

        return view('laporanAdmin.create', [
            'akun'      => $akun,
            'daftar_akun' => Akun::all(),
            'klaster'   => $klaster,
            'janji_temu' => $janji_temu
        ]);
    }

    // ====================== STORE ======================
    public function store(Request $request)
    {
        $request->validate([
            'id_akun'            => 'required',
            'tanggal'            => 'nullable|date',
            'jenis_pemeriksaan'  => 'required',
            'hasil_pemeriksaan'  => 'nullable',
            'anamnesis'          => 'nullable',
            'tekanan_darah'      => 'nullable',
            'diagnosa'           => 'nullable',
            'saran'              => 'nullable',
            'janji_temu_id'      => 'nullable|exists:janji_temus,id'
        ]);

        $akun = Akun::findOrFail($request->id_akun);

        // Cek jika ada janji_temu_id, pastikan belum ada laporan untuk janji temu itu
        if ($request->janji_temu_id) {
            $cekLaporan = Laporan::where('janji_temu_id', $request->janji_temu_id)->first();
            if ($cekLaporan) {
                return back()->with('error', 'Laporan untuk janji temu ini sudah ada!');
            }
        }

        Laporan::create([
            'id_akun' => $akun->id_akun,
            'nama_pasien' => $akun->nama,
            'nik' => $akun->nik,

            'tanggal' => $request->tanggal ?: now(),
            'jenis_pemeriksaan' => $request->jenis_pemeriksaan,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,

            'anamnesis' => $request->anamnesis,
            'tekanan_darah' => $request->tekanan_darah,
            'diagnosa' => $request->diagnosa,
            'saran' => $request->saran,

            'riwayat_penyakit_sekarang' => $request->riwayat_penyakit_sekarang,
            'riwayat_penyakit_dahulu' => $request->riwayat_penyakit_dahulu,
            'riwayat_penyakit_keluarga' => $request->riwayat_penyakit_keluarga,
            'riwayat_kebiasaan' => $request->riwayat_kebiasaan,
            'anamnesis_organ' => $request->anamnesis_organ,
            'janji_temu_id' => $request->janji_temu_id
        ]);

        return redirect()->route('laporanAdmin.index')
            ->with('success', 'Rekam medis berhasil ditambahkan!');
    }

    // ====================== EDIT ======================
    public function edit($id)
    {
        $laporan = Laporan::with(['janjiTemu', 'janjiTemu.dokter', 'janjiTemu.tanggal'])->findOrFail($id);
        return view('laporanAdmin.edit', compact('laporan'));
    }

    // ====================== UPDATE ======================
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $request->validate([
            'tanggal' => 'nullable|date',
            'jenis_pemeriksaan' => 'required'
        ]);

        $laporan->update([
            'tanggal' => $request->tanggal ?: $laporan->tanggal,
            'jenis_pemeriksaan' => $request->jenis_pemeriksaan,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,

            'anamnesis' => $request->anamnesis,
            'tekanan_darah' => $request->tekanan_darah,
            'diagnosa' => $request->diagnosa,
            'saran' => $request->saran,

            'riwayat_penyakit_sekarang' => $request->riwayat_penyakit_sekarang,
            'riwayat_penyakit_dahulu' => $request->riwayat_penyakit_dahulu,
            'riwayat_penyakit_keluarga' => $request->riwayat_penyakit_keluarga,
            'riwayat_kebiasaan' => $request->riwayat_kebiasaan,
            'anamnesis_organ' => $request->anamnesis_organ
        ]);

        return redirect()->route('laporanAdmin.show', $laporan->id_akun)
            ->with('success', 'Rekam medis berhasil diperbarui.');
    }

    // ====================== DELETE ======================
    public function destroy($id)
    {
        Laporan::findOrFail($id)->delete();

        return back()->with('success', 'Rekam medis berhasil dihapus.');
    }
}
