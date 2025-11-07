<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatInapsTable extends Migration
{
    public function up()
    {
        Schema::create('rawat_inaps', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm')->nullable();
            $table->string('nama_pasien');
            $table->dateTime('tanggal_masuk');
            $table->string('kamar')->nullable();
            $table->text('diagnosa')->nullable();
            $table->string('dokter');
            $table->string('perawat')->nullable();
            $table->string('status')->default('Dirawat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rawat_inaps');
    }
}