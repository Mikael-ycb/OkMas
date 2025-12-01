<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    protected $table = 'periksa';

    protected $fillable = [
        'id_akun',
        'janji_temu_id',
        'nama_pasien',
        'klaster',
        'tanggal_periksa',
        'status',
        'periksa_id'
    ];
    protected $casts = [
        'tanggal_periksa' => 'date',
    ];

    public function getTanggalFormattedAttribute()
{
    $tgl = optional(optional($this->janjiTemu)->tanggal)->tanggal;
    return $tgl ? \Carbon\Carbon::parse($tgl)->format('d M Y') : '-';
}

    public function janjiTemu()
{
    return $this->belongsTo(JanjiTemu::class, 'janji_temu_id');
}

    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'Tidak Aktif'); // atau Selesai
    }

    public function laporan()
{
    return $this->hasOne(Laporan::class, 'periksa_id');
}


}
