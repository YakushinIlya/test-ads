<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $fillable = [
        'id_country', 'id_region', 'old', 'city_name_ru', 'city_name_en'
    ];

    public function ads()
    {
        return $this->belongsToMany('App\Model\Ads', 'adscity', 'city_id', 'ads_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\User', 'usercity', 'city_id', 'user_id');
    }
}
