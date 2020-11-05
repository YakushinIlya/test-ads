<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Adsregion extends Model
{
    protected $table = 'adsregion';

    protected $fillable = [
        'ads_id', 'region_id'
    ];

    public static function region()
    {
        return self::select('region_id as id')->groupBy('region_id')->get()->toArray();
    }
}
