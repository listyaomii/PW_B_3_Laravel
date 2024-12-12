<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id('tiket_id'); // Primary key
            $table->string('kelas'); // Kelas tiket (e.g., Ekonomi, Bisnis)
            $table->decimal('harga', 10, 2); // Harga tiket
            $table->unsignedBigInteger('id_penerbangan'); // Foreign key ke tabel penerbangans
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key constraint
            $table->foreign('id_penerbangan')->references('id_penerbangan')->on('penerbangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tikets');
    }
}
