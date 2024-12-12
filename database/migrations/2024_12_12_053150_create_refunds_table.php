<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id('id_refund'); // Primary key
            $table->unsignedBigInteger('id_pemesanan'); // Foreign key ke tabel pemesanans
            $table->unsignedBigInteger('id_admin'); // Foreign key ke tabel admins
            $table->decimal('Total_refund', 15, 2); // Total refund dengan format desimal
            $table->string('no_rekening'); // Nomor rekening untuk pengembalian dana
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanans')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_admin')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunds');
    }
}
