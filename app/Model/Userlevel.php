<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Userlevel extends Model
{
    protected $table = 'userlevel';

    protected $fillable = [
        'user_id', 'role_id'
    ];
}
