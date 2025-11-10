<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'nama_pasien',
        'nik',
        'tanggal',
        'jenis_pemeriksaan',
        'hasil_pemeriksaan',
        'anamnesis',
        'tekanan_darah',
        'riwayat_penyakit_sekarang',
        'riwayat_penyakit_dahulu',
        'riwayat_penyakit_keluarga',
        'riwayat_kebiasaan',
        'anamnesis_organ',
    ];

    protected $dates = ['tanggal'];
    protected $casts = [
    'tanggal' => 'datetime',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
