<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table ='siswas';

    protected $fillable = [
        'img',
        'nis',
        'nama_siswa',
        'jk',
        'tmp_lahir',
        'tgl_lahir',
        'alamat',
        'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function nilais()
    {
        return $this->hasOne(Nilai::class, 'nilai_id');
    }
}
