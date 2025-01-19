<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbl_merk', function (Blueprint $table) {
            $table->increments('merk_id');
            $table->string('merk_nama');
            $table->string('merk_slug');
            $table->string('merk_keterangan')->nullable();
            $table->unsignedInteger('jenisbarang_id')->nullable(); // Tambahkan disini langsung
            $table->foreign('jenisbarang_id')->references('jenisbarang_id')->on('tbl_jenisbarang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_merk');
    }
};