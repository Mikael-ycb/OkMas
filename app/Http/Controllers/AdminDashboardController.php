<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JanjiTemu;
use App\Models\Akun;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total Dokter
        $totalDokter = Dokter::count();

        // Total Janji Temu
        $totalJanjiTemu = JanjiTemu::count();

        // Total Pasien
        $totalPasien = Akun::where('role', 'pasien')->count();

        // Total Kamar (assuming dari klaster data)
        $totalKamar = 0; // Sesuaikan dengan struktur DB Anda
        $kamarPribadi = 0; // Sesuaikan

        // Total Pengunjung
        $totalPengunjung = JanjiTemu::count(); // Bisa disesuaikan

        // Janji Temu Terbaru (5 data terbaru)
        $janjiTemuTerbaru = JanjiTemu::with([
            'akun',
            'dokter',
            'klaster',
            'tanggal'
        ])
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();

        return view('adminDashboard.index', [
            'totalDokter' => $totalDokter,
            'totalJanjiTemu' => $totalJanjiTemu,
            'totalPasien' => $totalPasien,
            'totalKamar' => $totalKamar,
            'kamarPribadi' => $kamarPribadi,
            'totalPengunjung' => $totalPengunjung,
            'janjiTemuTerbaru' => $janjiTemuTerbaru,
        ]);
    }
}
