// Migration untuk detail barang (tbl_request_barang_detail)
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_request_barang_detail', function (Blueprint $table) {
            $table->increments('request_detail_id');
            $table->string('request_id');
            $table->string('barang_kode');  // Mengacu ke tbl_barang.barang_kode
            $table->integer('jumlah');
            $table->decimal('harga', 15, 2);
            $table->string('keterangan')->nullable();
            $table->timestamps();
            
            $table->foreign('request_id')
                  ->references('request_id')
                  ->on('tbl_request_barang')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_request_barang_detail');
    }
};