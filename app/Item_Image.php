<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_Image extends Model
{
    protected $table = 'item_image';
    protected $fillable = [
        'code_item',
        'image'
    ];
}
