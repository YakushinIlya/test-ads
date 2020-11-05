<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usercity extends Model
{
    protected $table = 'usercity';

    protected $fillable = [
        'user_id', 'city_id'
    ];
}
