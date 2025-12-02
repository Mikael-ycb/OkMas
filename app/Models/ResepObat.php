<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    protected $table = 'resep_obat';

    protected $fillable = [
        'laporan_id',
        'id_akun',
        'dokter',
        'tanggal'
    ];

    public function pasien()
    {
        return $this->belongsTo(Akun::class, 'id_akun', 'id_akun');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }

    public function detail()
    {
        return $this->hasMany(ResepDetail::class, 'resep_id');
    }
}
