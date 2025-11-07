<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('polis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_poli')->unique();
            $table->string('nama_poli');
            $table->string('dokter')->nullable();
            $table->integer('kapasitas')->nullable();
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('polis');
    }
};
