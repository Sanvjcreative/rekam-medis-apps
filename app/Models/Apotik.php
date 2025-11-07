<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apotik extends Model
{
    protected $table = 'apotiks';

    protected $fillable = [
        'no_resep',
        'no_rm',
        'nama_pasien',
        'tanggal',
        'dokter',
        'obat',
        'jumlah',
        'aturan_pakai',
        'status'
    ];
}