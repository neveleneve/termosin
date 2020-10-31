<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_Transaksi extends Model
{
    protected $table = 'master_transaksi';
    protected $fillable = [
        'id_trx',
        'id_pengguna',
        'email',
        'nama',
        'alamat',
        'provinsi',
        'kota',
        'kodepos',
        'nohp',
        'catatan',
        'alamat',
        'total',
        'kode',
        'status'
    ];
}
