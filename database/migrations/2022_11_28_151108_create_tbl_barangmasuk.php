<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_barangmasuk', function (Blueprint $table) {
            $table->increments('bm_id');
            $table->integer('user_id');
            $table->string('bm_kode');
            $table->string('request_id');
            $table->string('barang_kode');
            $table->string('bm_tanggal');
            $table->string('bm_jumlah');
            $table->string('divisi');
            $table->string('approval')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_barangmasuk');
    }
};
