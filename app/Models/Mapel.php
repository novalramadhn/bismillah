<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
    ];

    protected $table ='mapels';

    public function gurus()
    {
        return $this->hasOne(Guru::class, 'guru_id');
    }

    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'jadwal_id');
    }
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'nilai_id');
    }



}
