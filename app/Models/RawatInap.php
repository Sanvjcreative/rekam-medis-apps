<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    protected $table = 'rawat_inaps';

    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'tanggal_masuk',
        'kamar',
        'diagnosa',
        'dokter',
        'perawat',
        'status'
    ];
}