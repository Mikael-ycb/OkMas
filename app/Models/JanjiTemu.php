<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    use HasFactory;

    protected $table = 'janji_temus';

    protected $fillable = [
        'id_akun',
        'tanggal_id',
        'klaster_id',
        'dokter_id',
        'keluhan',
        'nomor_antrian',
        'status'
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'id_akun', 'id_akun');
    }

    public function klaster()
    {
        return $this->belongsTo(Klaster::class, 'klaster_id');
    }

    public function tanggal()
    {
        return $this->belongsTo(Tanggal::class, 'tanggal_id');
    }

    public function dokter()
{
    return $this->belongsTo(Dokter::class, 'dokter_id');
}

    public function periksa()
    {
        return $this->hasOne(Periksa::class, 'janji_temu_id');
    }
}
