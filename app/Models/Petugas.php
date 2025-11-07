<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $fillable = [
        'nip', 'nama', 'email', 'jabatan', 'poli', 'no_hp', 'alamat', 'status'
    ];
}
