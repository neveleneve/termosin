<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = [
        'ipaddress',
        'id_item',
        'id_item_color',
        'jumlah',
        'harga'
    ];
}
