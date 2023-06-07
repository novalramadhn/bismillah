<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    use HasFactory;

    protected $fillable = [
        'jam',
    ];

    protected $guarded = ['id'];

    protected $table ='waktus';

    public function jadwal()
{
    return $this->hasMany(Jadwal::class, 'id');
}
}
