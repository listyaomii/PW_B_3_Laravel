<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('id_admin'); // Primary key
            $table->string('nama_admin'); // Nama admin
            $table->string('email_admin')->unique(); // Email admin yang unik
            $table->string('password_admin'); // Password admin

            // Foreign keys
            $table->unsignedBigInteger('id_user')->nullable(); // FK ke tabel users
            $table->unsignedBigInteger('id_penerbangan')->nullable(); // FK ke tabel penerbangans
            $table->unsignedBigInteger('id_refund')->nullable(); // FK ke tabel refunds

            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
            $table->foreign('id_penerbangan')->references('id_penerbangan')->on('penerbangans')->onDelete('set null');
            $table->foreign('id_refund')->references('id_refund')->on('refunds')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            // Menghapus foreign keys sebelum drop tabel
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_penerbangan']);
            $table->dropForeign(['id_refund']);
        });

        Schema::dropIfExists('admins');
    }
}
