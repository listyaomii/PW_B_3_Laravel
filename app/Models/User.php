<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'password',
        'username',
        'nama_user',
        'alamat',
        'email_user',
        'telp_user',
        'foto',
    ];

        /**
     * Relasi ke tabel Pemesanan (One-to-Many).
     * Satu user bisa memiliki banyak pemesanan.
     */
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'user_id', 'id_user');
    }

    /**
     * Relasi ke tabel Pembayaran (One-to-Many).
     * Satu user bisa melakukan banyak pembayaran.
     */
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'user_id', 'id_user');
    }

    /**
     * Relasi ke tabel Refund (One-to-Many).
     * Satu user bisa mengajukan banyak refund.
     */
    public function refund()
    {
        return $this->hasMany(Refund::class, 'user_id', 'id_user');
    }

    /**
     * Relasi ke tabel Penumpang (One-to-Many).
     * Satu user bisa mendaftarkan banyak penumpang.
     */
    public function penumpang()
    {
        return $this->hasMany(Penumpang::class, 'user_id', 'id_user');
    }

    /**
     * Relasi ke tabel Tiket (One-to-Many).
     * Satu user bisa memiliki banyak tiket.
     */
    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'user_id', 'id_user');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
