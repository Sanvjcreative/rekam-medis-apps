<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'polis';

    protected $fillable = [
        'kode_poli',
        'nama_poli',
        'dokter',
        'kapasitas',
        'status',
    ];
}
