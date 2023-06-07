<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'mapel_id',
        'semester_id',
        'tugas',
        'uts',
        'uas',
        'grade',
    ];

    protected $guarded = ['id'];

    public function siswas()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function mapels()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
    public function semesters()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    
    use HasFactory;
}
