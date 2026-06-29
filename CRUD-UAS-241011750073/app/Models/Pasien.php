<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasiens';
    protected $primaryKey = 'id_pasien';
    protected $fillable = [
        'gambar',
        'nama_pasien',
        'diagnosa',
        'dokter',
        'tanggal_kunjungan',
    ];
}
