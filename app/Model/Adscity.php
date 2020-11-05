<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Adscity extends Model
{
    protected $table = 'adscity';

    protected $fillable = [
        'ads_id', 'city_id'
    ];

    public static function city()
    {
        return self::select('city_id as id')->groupBy('city_id')->get()->toArray();
    }
}
