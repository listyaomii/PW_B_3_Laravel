<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenumpangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penumpangs', function (Blueprint $table) {
            $table->id('id_penumpang'); // Primary key
            $table->string('nama_lengkap'); // Nama lengkap penumpang
            $table->string('bandara_tujuan'); // Bandara tujuan penumpang
            $table->string('title_penumpang'); // Title (e.g., Mr, Mrs, Ms)
            $table->string('no_identitas')->unique(); // Nomor identitas unik
            $table->string('no_telp'); // Nomor telepon penumpang
            $table->date('tgl_lahir'); // Tanggal lahir penumpang
            $table->string('kewarganegaraan'); // Kewarganegaraan penumpang
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penumpangs');
    }
}
