<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    use HasFactory;

    protected $table = 'janjiTemu';

    protected $fillable = [
        'tanggal_id',
        'klaster_id',
        'dokter_id',
        'keluhan',
    ];

    public function tanggal()
    {
        return $this->belongsTo(Tanggal::class);
    }

    public function klaster()
    {
        return $this->belongsTo(Klaster::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
