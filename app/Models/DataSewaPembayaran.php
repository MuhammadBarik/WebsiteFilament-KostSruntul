<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSewaPembayaran extends Model
{
    protected $table = 'data_sewa_pembayarans';

    protected $fillable = [
        'nama',
        'asal',
        'no_hp',
        'nama_kamar',
        'durasi',
        'tgl_mulai',
        'total_harga',
        'status',
    ];
}
