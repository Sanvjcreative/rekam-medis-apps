<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawatJalan extends Model
{
    protected $table = 'rawat_jalans';

    protected $fillable = [
        'no_rm', 'nama_pasien', 'tanggal_kunjungan', 'poli', 'dokter', 'diagnosa', 'status'
    ];
}
