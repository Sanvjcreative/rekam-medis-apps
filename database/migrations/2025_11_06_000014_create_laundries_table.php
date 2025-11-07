<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaundriesTable extends Migration
{
    public function up()
    {
        Schema::create('laundries', function (Blueprint $table) {
            $table->id();
            $table->string('kode_laundry')->unique();
            $table->string('jenis');
            $table->integer('jumlah')->default(0);
            $table->dateTime('tanggal_masuk');
            $table->dateTime('tanggal_keluar')->nullable();
            $table->string('petugas');
            $table->text('catatan')->nullable();
            $table->string('status')->default('Proses');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laundries');
    }
}