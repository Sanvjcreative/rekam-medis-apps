<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obats';

    protected $fillable = [
        'kode_obat', 'nama_obat', 'kategori', 'stok', 'satuan', 'harga', 'expired', 'status'
    ];
}
