<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasirsTable extends Migration
{
    public function up()
    {
        Schema::create('kasirs', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice')->unique();
            $table->string('no_rm')->nullable();
            $table->string('nama_pasien');
            $table->date('tanggal');
            $table->string('jenis_layanan');
            $table->decimal('total', 12, 2)->default(0);
            $table->string('metode_pembayaran')->nullable();
            $table->string('status')->default('Belum Dibayar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kasirs');
    }
}