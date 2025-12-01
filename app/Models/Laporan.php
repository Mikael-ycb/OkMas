<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'id_akun',
        'periksa_id',
        'tanggal',
        'nama_pasien', 
        'nik',
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
    public $timestamps = true;

    public function akun()
    {
        return $this->belongsTo(\App\Models\Akun::class, 'id_akun', 'id_akun');
    }

    public function periksa()
{
    return $this->belongsTo(Periksa::class, 'periksa_id');
}

}



