<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('id_pemesanan'); // Primary key
            $table->unsignedBigInteger('id_tiket'); // Foreign key ke tabel tiket
            $table->unsignedBigInteger('id_penumpang'); // Foreign key ke tabel penumpang
            $table->date('tanggal_pemesanan');
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key
            $table->foreign('id_tiket')->references('id_tiket')->on('tikets')->onDelete('cascade');
            $table->foreign('id_penumpang')->references('id_penumpang')->on('penumpangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
