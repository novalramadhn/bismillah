<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_hari',
    ];

    protected $guarded = ['id'];

    protected $table ='haris';

    public function jadwal()
{
    return $this->hasMany(Jadwal::class, 'id');
}
}
