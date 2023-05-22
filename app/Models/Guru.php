<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guru extends Model
{
    use HasFactory;

    protected $table ='gurus';

    protected $fillable = [
        'img',
        'nip',
        'nama_guru',
        'jk',
        'tmp_lahir',
        'tgl_lahir',
        'alamat',
        'mapel_id',
    ];

    public function mapels()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
