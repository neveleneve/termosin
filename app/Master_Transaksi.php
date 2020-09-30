<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_Transaksi extends Model
{
    protected $table = 'master_transaksi';
    protected $fillable = [
        'id_pengguna',
        'alamat',
        'total',
        'total_transaksi'
    ];
}
