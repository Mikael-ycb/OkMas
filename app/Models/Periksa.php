<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    protected $table = 'periksa';

    protected $fillable = [
        'nama_pasien',
        'klaster',
        'tanggal_periksa',
        'status',
        'janji_temu_id'
    ];

    protected $casts = [
        'tanggal_periksa' => 'date',
    ];

    public function janjiTemu()
    {
        return $this->belongsTo(JanjiTemu::class);
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'Tidak Aktif'); // atau Selesai
    }
}
