<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Obat;
use App\Models\Laporan;
use App\Models\ResepObat;
use App\Models\ResepDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ResepObatController extends Controller
{
    // ========================== INDEX ==========================
    public function index()
    {
        $resep = ResepObat::with([
            'pasien', 
            'laporan', 
            'laporan.janjiTemu', 
            'laporan.janjiTemu.dokter',
            'laporan.periksa',
            'laporan.periksa.janjiTemu',
            'laporan.periksa.janjiTemu.dokter'
        ])->latest()->paginate(10);

        return view('resep.index', compact('resep'));
    }

    // ========================== CREATE ==========================
    public function create(Request $request)
    {
        // Ambil laporan dari query string (dari tombol di laporan detail)
        $laporan_id = $request->query('laporan_id');
        
        if ($laporan_id) {
            // Jika dari laporan detail
            $laporan = Laporan::findOrFail($laporan_id);

            // Cek jika sudah ada resep untuk laporan ini
            $resepExist = ResepObat::where('laporan_id', $laporan->id)->first();
            if ($resepExist) {
                return back()->with('error', 'Resep obat untuk laporan ini sudah dibuat! Tidak boleh membuat resep dua kali untuk pemeriksaan yang sama.');
            }

            $saran = Obat::saran($laporan->diagnosa ?? '');

            return view('resep.create', [
                'laporan' => $laporan,
                'pasien' => $laporan->akun,
                'obat' => Obat::all(),
                'saran' => $saran
            ]);
        } else {
            // Jika dari halaman index resep, pilih laporan terlebih dahulu
            $laporan = Laporan::with(['akun', 'resepObat'])
                ->orderBy('tanggal', 'desc')
                ->get();

            return view('resep.create-select-laporan', [
                'laporan' => $laporan,
                'obat' => Obat::all()
            ]);
        }
    }

    // ========================== STORE ==========================
    public function store(Request $request)
    {
        $request->validate([
            'laporan_id' => 'required',
            'tanggal' => 'required',
            'obat' => 'required|array',
            'jumlah' => 'required|array'
        ]);

        $laporan = Laporan::findOrFail($request->laporan_id);

        // Cek lagi jika sudah ada resep untuk laporan ini
        $resepExist = ResepObat::where('laporan_id', $laporan->id)->first();
        if ($resepExist) {
            return back()->with('error', 'Resep obat untuk laporan ini sudah dibuat!');
        }

        // Ambil dokter dari janji_temu (pemeriksaan), jika ada
        $dokter = 'Admin';
        
        // Priority 1: Ambil dari janji_temu langsung
        if ($laporan->janji_temu_id && $laporan->janjiTemu && $laporan->janjiTemu->dokter) {
            $dokter = $laporan->janjiTemu->dokter->nama_dokter;
        }
        // Priority 2: Ambil dari periksa → janji_temu → dokter (fallback)
        elseif ($laporan->periksa_id && $laporan->periksa && $laporan->periksa->janjiTemu && $laporan->periksa->janjiTemu->dokter) {
            $dokter = $laporan->periksa->janjiTemu->dokter->nama_dokter;
        }

        // Buat resep header
        $resep = ResepObat::create([
            'laporan_id' => $laporan->id,
            'id_akun' => $laporan->id_akun,
            'dokter' => $dokter,
            'tanggal' => $request->tanggal
        ]);

        // Buat detail obat
        foreach ($request->obat as $index => $obat_id) {

            $qty = $request->jumlah[$index];

            // Kurangi stok obat
            $ob = Obat::find($obat_id);
            $ob->stok -= $qty;
            $ob->save();

            ResepDetail::create([
                'resep_id' => $resep->id,
                'obat_id' => $obat_id,
                'jumlah' => $qty,
                'aturan_pakai' => $request->aturan_pakai[$index] ?? null
            ]);
        }

        // ==================== AUTO-UPDATE STATUS JANJI TEMU ====================
        // Jika laporan terikat dengan janji_temu, update status ke 'selesai'
        if ($laporan->janji_temu_id) {
            $laporan->janjiTemu()->update([
                'status' => 'selesai'
            ]);
        }

        return redirect()->route('resep.index')
            ->with('success', 'Resep obat berhasil dibuat dan status pemeriksaan diperbarui!');
    }

    // ========================== SHOW ==========================
    public function show($id)
    {
        $resep = ResepObat::with([
            'pasien', 
            'laporan', 
            'laporan.janjiTemu', 
            'laporan.janjiTemu.dokter',
            'laporan.periksa',
            'laporan.periksa.janjiTemu',
            'laporan.periksa.janjiTemu.dokter',
            'detail.obat'
        ])->findOrFail($id);

        return view('resep.show', compact('resep'));
    }

    // ========================== DELETE ==========================
    public function destroy($id)
    {
        $resep = ResepObat::findOrFail($id);

        // Kembalikan stok obat
        foreach ($resep->detail as $d) {
            $ob = Obat::find($d->obat_id);
            $ob->stok += $d->jumlah;
            $ob->save();
        }

        $resep->delete();

        return back()->with('success', 'Resep berhasil dihapus.');
    }
}
