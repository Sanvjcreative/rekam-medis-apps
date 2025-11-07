<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';

    protected $fillable = [
        'no_rm', 'nama_pasien', 'tanggal', 'poli', 'dokter', 'diagnosa', 'status'
    ];
}
