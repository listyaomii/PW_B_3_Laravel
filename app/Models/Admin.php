<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    
    protected $fillable = [
        'nama_admin',
        'username_admin',
        'email_admin',
        'password_admin',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_admin', 'id_admin');
    }

    public function penerbangan()
    {
        return $this->hasMany(Penerbangan::class, 'id_admin', 'id_admin');
    }

    public function refunds()
    {
        return $this->hasManyThrough(Refund::class, User::class, 'id_admin', 'id_user', 'id_admin', 'id_user');
    }

}
