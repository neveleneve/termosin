<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = [
        'code',
        'namaitem',
        'harga',
        'diskonstate',
        'diskon',
        'img'
    ];
}
