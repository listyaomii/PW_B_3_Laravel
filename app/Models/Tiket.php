<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tikets';
    protected $primaryKey = 'tiket_id';

    protected $fillable = [
        'kelas',
        'harga',
        'id_penerbangan',
    ];

    public function penerbangan(){
        return $this->belongsTo(Penerbangan::class, 'id_penerbangan');
    }

    public function pemesanan(){
        return $this->hasOne(Pemesanan::class, 'id_tiket');
    }

}
