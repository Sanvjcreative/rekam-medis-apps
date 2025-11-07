<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Radiologi extends Model
{
    protected $table = 'radiologis';

    protected $fillable = [
        'no_radiologi',
        'no_rm',
        'nama_pasien',
        'tanggal',
        'jenis_pemeriksaan',
        'hasil',
        'dokter',
        'status'
    ];
}