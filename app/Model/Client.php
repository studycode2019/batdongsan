<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'phone', 'name', 'address', 'email', 'birthday', 'zalo'
    ];
}
