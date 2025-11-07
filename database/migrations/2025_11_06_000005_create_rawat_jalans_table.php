<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatJalansTable extends Migration
{
    public function up()
    {
        Schema::create('rawat_jalans', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm')->nullable();
            $table->string('nama_pasien')->nullable();
            $table->date('tanggal_kunjungan')->nullable();
            $table->string('poli')->nullable();
            $table->string('dokter')->nullable();
            $table->text('diagnosa')->nullable();
            $table->string('status')->default('Selesai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rawat_jalans');
    }
}
