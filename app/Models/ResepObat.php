<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    protected $table = 'resep_obat';

    protected $fillable = [
        'id_pasien',
        'id_obat',
        'jumlah',
        'aturan_pakai',
        'tanggal_resep'
    ];

    public function pasien()
    {
        return $this->belongsTo(Akun::class, 'id_pasien');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
