<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemColor extends Model
{
    protected $table = 'item_color';
    protected $fillable = [
        'code_item',
        'warna'
    ];
}
