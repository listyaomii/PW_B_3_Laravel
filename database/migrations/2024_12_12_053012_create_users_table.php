<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // Kolom ID User
            $table->string('username')->unique(); // Kolom username yang unik
            $table->string('nama_user'); // Kolom nama_user
            $table->string('alamat'); // Kolom jenis_kelamin
            $table->string('email_user')->unique(); // Kolom email_user yang unik
            $table->string('telp_user'); // Kolom telp_user
            $table->string('password'); // Kolom password
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable(); // Kolom untuk menghubungkan ke Admin (optional)
            $table->timestamps(); // Kolom created_at dan updated_at
    
            // Menambahkan foreign key untuk relasi ke tabel admins
            $table->foreign('id_admin')->references('id_admin')->on('admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus foreign key jika tabel users di-drop
            $table->dropForeign(['id_admin']);
        });
    
        Schema::dropIfExists('users');
    }
};
