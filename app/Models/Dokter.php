<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters'; // <— penting
    protected $fillable = [
        'nama_dokter',
        'id_dokter',
        'klaster_id',
    ];

    public function klaster()
    {
        return $this->belongsTo(Klaster::class);
    }
}
