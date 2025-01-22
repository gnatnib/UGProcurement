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
        // Add tracking_status to tbl_barangmasuk
        Schema::table('tbl_barangmasuk', function (Blueprint $table) {
            $table->string('tracking_status')->nullable()->after('status');
        });

        // Update status enum in tbl_request_barang
        Schema::table('tbl_request_barang', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('tbl_request_barang', function (Blueprint $table) {
            $table->enum('status', ['draft', 'pending', 'Diproses', 'Dikirim', 'Diterima'])->default('draft');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_barangmasuk', function (Blueprint $table) {
            $table->dropColumn('tracking_status');
        });

        Schema::table('tbl_request_barang', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('tbl_request_barang', function (Blueprint $table) {
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected'])->default('draft');
        });
    }
};
