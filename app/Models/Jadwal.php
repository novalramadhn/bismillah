<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

    protected $fillable = [
        'hari_id',
        'kelas_id',
        'mapel_id',
        'guru_id',
        'waktu_id',
        'ruang_id',
    ];

    protected $guarded = ['id'];

    public function hari()
    {
        return $this->belongsTo(Hari::class, 'hari_id');
    }

    public function waktu()
    {
        return $this->belongsTo(Waktu::class, 'waktu_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function mapels()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function ruangs()
    {
        return $this->belongsTo(Kelas::class, 'ruang_id');
    }

    use HasFactory;
}
