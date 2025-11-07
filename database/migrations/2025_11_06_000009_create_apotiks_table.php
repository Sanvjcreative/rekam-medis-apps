<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApotiksTable extends Migration
{
    public function up()
    {
        Schema::create('apotiks', function (Blueprint $table) {
            $table->id();
            $table->string('no_resep')->unique();
            $table->string('no_rm')->nullable();
            $table->string('nama_pasien');
            $table->date('tanggal');
            $table->string('dokter');
            $table->text('obat');
            $table->integer('jumlah')->default(0);
            $table->text('aturan_pakai')->nullable();
            $table->string('status')->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apotiks');
    }
}