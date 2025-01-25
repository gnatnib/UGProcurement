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
        Schema::create('tbl_signatures', function (Blueprint $table) {
            $table->id('signature_id');
            $table->string('request_id');
            $table->unsignedInteger('user_id');
            $table->string('role_id');
            $table->longText('signature');
            $table->string('action');
            $table->string('signer_type'); // 'GM' or 'GMHCGA'
            $table->timestamps();

            $table->foreign('request_id')->references('request_id')->on('tbl_request_barang');
            $table->foreign('user_id')->references('user_id')->on('tbl_user');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_signatures');
    }
};
