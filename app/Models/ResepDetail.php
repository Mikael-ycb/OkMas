<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResepDetail extends Model
{
    protected $table = 'resep_detail';

    protected $fillable = [
        'resep_id',
        'obat_id',
        'jumlah',
        'aturan_pakai'
    ];

    public function resep()
    {
        return $this->belongsTo(ResepObat::class, 'resep_id');
    }
    
    public function obat()
    {
        return $this->belongsTo(\App\Models\Obat::class, 'obat_id');
    }
}
