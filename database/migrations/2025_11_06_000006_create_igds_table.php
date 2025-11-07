<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIgdsTable extends Migration
{
    public function up()
    {
        Schema::create('igds', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm')->nullable();
            $table->string('nama_pasien');
            $table->dateTime('tanggal_masuk');
            $table->text('keluhan')->nullable();
            $table->text('diagnosa')->nullable();
            $table->text('tindakan')->nullable();
            $table->string('dokter');
            $table->string('perawat')->nullable();
            $table->string('status')->default('Dalam Penanganan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('igds');
    }
}