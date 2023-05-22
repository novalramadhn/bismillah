<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kelas',
        'nama_kelas',
        'ruangan'
    ];

    protected $guarded = ['id'];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'id');
    }
}
