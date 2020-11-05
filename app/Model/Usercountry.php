<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usercountry extends Model
{
    protected $table = 'usercountry';

    protected $fillable = [
        'user_id', 'country_id'
    ];
}
