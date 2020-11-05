<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Adsuser extends Model
{
    protected $table = 'adsuser';

    protected $fillable = [
        'ads_id', 'user_id'
    ];
}
