<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    protected $table = 'laundries';

    protected $fillable = [
        'kode_laundry',
        'jenis',
        'jumlah',
        'tanggal_masuk',
        'tanggal_keluar',
        'petugas',
        'catatan',
        'status'
    ];
}