<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'tanggal_daftar',
        'poli',
        'dokter',
        'status',
        'keluhan',
    ];
}
