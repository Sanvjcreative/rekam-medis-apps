<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table = 'kasirs';

    protected $fillable = [
        'no_invoice',
        'no_rm',
        'nama_pasien',
        'tanggal',
        'jenis_layanan',
        'total',
        'metode_pembayaran',
        'status'
    ];
}