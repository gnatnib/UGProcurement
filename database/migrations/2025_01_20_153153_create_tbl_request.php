<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_request_barang', function (Blueprint $table) {
            $table->string('request_id')->primary();
            $table->integer('user_id')->unsigned();
            $table->date('request_tanggal');
            $table->string('departemen');
            $table->string('divisi');
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected', 'Diproses', 'Dikirim', 'Diterima','Ditolak'])->default('draft');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('user_id')->on('tbl_user');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_request_barang');
    }
};