<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanans';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_tiket',
        'id_penumpang',
        'tanggal_pemesanan'
    ];

    public function tiket(){
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }

    public function penumpang(){
        return $this->belongsTo(Penumpang::class, 'id_penumpang');
    }
    
    public function refund(){
        return $this->hasOne(Refund::class, 'id_pemesanan');
    }

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class, 'id_pemesanan');
    }
}