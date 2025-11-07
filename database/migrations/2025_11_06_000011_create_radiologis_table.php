<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiologisTable extends Migration
{
    public function up()
    {
        Schema::create('radiologis', function (Blueprint $table) {
            $table->id();
            $table->string('no_radiologi')->unique();
            $table->string('no_rm')->nullable();
            $table->string('nama_pasien');
            $table->date('tanggal');
            $table->string('jenis_pemeriksaan');
            $table->text('hasil')->nullable();
            $table->string('dokter');
            $table->string('status')->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('radiologis');
    }
}