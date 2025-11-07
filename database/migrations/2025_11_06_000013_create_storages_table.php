<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoragesTable extends Migration
{
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->string('kode_berkas')->unique();
            $table->string('nama_berkas');
            $table->string('jenis');
            $table->date('tanggal');
            $table->string('lokasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('petugas');
            $table->string('status')->default('Tersimpan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('storages');
    }
}