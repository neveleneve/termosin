<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login_Admin extends Authenticatable
{
    protected $table = 'administrator';

    protected $hidden = ['password', 'remember_token'];
}
