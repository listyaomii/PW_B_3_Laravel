<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerbangansTable extends Migration
{

    public function up()
    {
        Schema::create('penerbangans', function (Blueprint $table) {
            $table->id('id_penerbangan'); // Primary key
            $table->string('bandara_asal'); // Bandara asal
            $table->string('bandara_tujuan'); // Bandara tujuan
            $table->date('tanggal'); // Tanggal penerbangan
            $table->string('maskapai'); // Maskapai penerbangan
            $table->time('waktu_keberangkatan'); // Waktu keberangkatan
            $table->time('waktu_kedatangan'); // Waktu kedatangan
            $table->string('durasi'); // Durasi penerbangan
            $table->unsignedBigInteger('id_admin'); // Foreign key ke tabel admins
            $table->string('kode_penerbangan');
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key
            $table->foreign('id_admin')->references('id_admin')->on('admins')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('penerbangans');
    }
}
