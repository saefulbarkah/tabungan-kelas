<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable = [
        'siswa_id','nominal','user_id','tabungan_id','status',
    ];
}
