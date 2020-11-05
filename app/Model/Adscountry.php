<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Adscountry extends Model
{
    protected $table = 'adscountry';

    protected $fillable = [
        'ads_id', 'country_id'
    ];

    public static function country()
    {
        return self::select('country_id as id')->groupBy('country_id')->get()->toArray();
    }
}
