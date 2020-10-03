<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = [
        'ip_pengguna',
        'id_item',
        'jumlah',
        'bataswaktu'
    ];
}
