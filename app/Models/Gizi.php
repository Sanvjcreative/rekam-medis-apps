<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gizi extends Model
{
    protected $table = 'gizis';

    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'tanggal',
        'jenis_diet',
        'catatan',
        'petugas',
        'status'
    ];
}