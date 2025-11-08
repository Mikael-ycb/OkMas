<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $fillable = [
        'nama_pasien',
        'nik',
        'tanggal',
        'jenis_pemeriksaan',
        'anamnesis',
        'tekanan_darah',
        'riwayat_penyakit_sekarang',
        'riwayat_penyakit_dahulu',
        'riwayat_penyakit_keluarga',
        'riwayat_kebiasaan',
        'anamnesis_organ',
    ];
}
