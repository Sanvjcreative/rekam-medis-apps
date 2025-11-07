<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table = 'storages';

    protected $fillable = [
        'kode_berkas',
        'nama_berkas',
        'jenis',
        'tanggal',
        'lokasi',
        'keterangan',
        'petugas',
        'status'
    ];
}