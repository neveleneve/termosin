<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = [
        'namaitem',
        'harga',
        'deskripsi',
        'diskonstate',
        'diskon',
        'img'
    ];
}
