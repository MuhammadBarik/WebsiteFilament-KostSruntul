<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataMember extends Model
{
    protected $fillable = [
        'nama',
        'role',
        'asal',
        'tgl_lahir',
        'no_hp',
        'email',
    ];
}
