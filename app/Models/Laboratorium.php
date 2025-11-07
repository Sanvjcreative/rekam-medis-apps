<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    protected $table = 'laboratoriums';

    protected $fillable = [
        'no_lab',
        'no_rm',
        'nama_pasien',
        'tanggal',
        'jenis_pemeriksaan',
        'hasil',
        'dokter',
        'status'
    ];
}