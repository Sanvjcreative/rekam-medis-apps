<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGizisTable extends Migration
{
    public function up()
    {
        Schema::create('gizis', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm')->nullable();
            $table->string('nama_pasien');
            $table->date('tanggal');
            $table->string('jenis_diet');
            $table->text('catatan')->nullable();
            $table->string('petugas');
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gizis');
    }
}