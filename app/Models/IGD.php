<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IGD extends Model
{
    protected $table = 'igds';

    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'tanggal_masuk',
        'keluhan',
        'diagnosa',
        'tindakan',
        'dokter',
        'perawat',
        'status'
    ];
}