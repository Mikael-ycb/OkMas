<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPasienController extends Controller
{
    public function index()
{
    $riwayat = Laporan::with([
            'periksa',
            'periksa.janjiTemu',
            'periksa.janjiTemu.dokter',
            'periksa.janjiTemu.klaster',
            'periksa.janjiTemu.tanggal',
            'janjiTemu',
            'janjiTemu.dokter',
            'janjiTemu.klaster',
            'janjiTemu.tanggal',
            'resepObat.detail.obat',
            'akun'
        ])
        ->where('id_akun', Auth::user()->id_akun)
        ->orderBy('tanggal', 'desc')
        ->get();

    return view('laporan', compact('riwayat'));
}


    public function show($id)
    {
        $laporan = Laporan::with([
                'periksa',
                'periksa.janjiTemu',
                'periksa.janjiTemu.dokter',
                'periksa.janjiTemu.klaster',
                'periksa.janjiTemu.tanggal',
                'janjiTemu',
                'janjiTemu.dokter',
                'janjiTemu.klaster',
                'janjiTemu.tanggal'
            ])
            ->findOrFail($id);

        if ($laporan->id_akun != Auth::user()->id_akun) abort(403);

        return view('laporan_detail', compact('laporan'));
    }

    public function downloadPdf($id)
    {
        $laporan = Laporan::with([
                'periksa',
                'periksa.janjiTemu',
                'periksa.janjiTemu.dokter'
            ])->findOrFail($id);

        if ($laporan->id_akun != Auth::user()->id_akun) abort(403);

        try {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('laporan_pdf', compact('laporan'));
            return $pdf->download("Laporan_{$laporan->nama_pasien}.pdf");
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membuat PDF: ' . $e->getMessage());
        }
    }
}
