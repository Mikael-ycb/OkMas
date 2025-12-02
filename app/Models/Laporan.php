<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'id_akun',
        'nama_pasien',
        'nik',
        'tanggal',
        'jenis_pemeriksaan',
        'hasil_pemeriksaan',
        'anamnesis',
        'tekanan_darah',
        'diagnosa',
        'saran',
        'riwayat_penyakit_sekarang',
        'riwayat_penyakit_dahulu',
        'riwayat_penyakit_keluarga',
        'riwayat_kebiasaan',
        'anamnesis_organ',
        'periksa_id',
        'janji_temu_id'
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

    public function janjiTemu()
    {
        return $this->belongsTo(JanjiTemu::class, 'janji_temu_id');
    }

    public function resepObat()
    {
        return $this->hasMany(ResepObat::class, 'laporan_id');
    }
}



