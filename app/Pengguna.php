<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = [
        'namadepan',
        'namabelakang',
        'username',
        'email',
        'password',
        'jeniskelamin',
        'alamat'
    ];
}
