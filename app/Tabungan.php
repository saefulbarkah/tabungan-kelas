<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $table = 'tabungans';
    protected $fillable = [
        'siswa_id','saldo','user_id','tabungan_id',
    ];
}
