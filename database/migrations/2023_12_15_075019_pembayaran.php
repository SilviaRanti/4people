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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_booking');
            $table->foreign('id_booking')->references('id')->on('booking')->onDelete('cascade');
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade');
            $table->string('nama');
            $table->string('external_id');
            $table->decimal('harga', 15, 2);
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('pembayaran');
    }
};
