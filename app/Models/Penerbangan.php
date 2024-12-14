<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbangan extends Model
{
    use HasFactory;
    protected $table = 'penerbangans';
    protected $primaryKey = 'id_penerbangan';

    protected $fillable = [
        'bandara_asal',
        // 'bandara_tujuan',
        'tanggal',
        'maskapai',
        'waktu_keberangkatan',
        'waktu_kedatangan',
        'durasi',
        'kode_penerbangan',
      
    ];

    public function tiket(){
        return $this->hasMany(Tiket::class, 'id_penerbangan');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
