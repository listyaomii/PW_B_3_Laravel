<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;
    protected $table = 'penumpangs';
    protected $primaryKey = 'id_penumpang';

    protected $fillable = [
        'nama_lengkap',
        'bandara_tujuan',
        'title_penumpang',
        'no_identitas',
        'no_telp',
        'tgl_lahir',
        'kewarganegaraan',
    ];

    public function pemesanan(){
        return $this->hasOne(Pemesanan::class, 'id_penumpang');
    }
}
