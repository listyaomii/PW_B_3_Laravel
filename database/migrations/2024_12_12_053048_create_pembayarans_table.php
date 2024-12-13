<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{

    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran'); // Primary key
            $table->unsignedBigInteger('id_pemesanan'); // Foreign key ke tabel pemesanan
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanans')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
