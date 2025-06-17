<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPemesanan extends Model
{
    protected $fillable = [
        'nama',
        'no_hp',
        'nama_kamar',
        'durasi',
        'total_harga',
    ];
}
