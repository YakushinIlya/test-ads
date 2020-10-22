<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    protected $fillable = [
        'old', 'country_name_ru', 'country_name_en'
    ];

    public function ads()
    {
        return $this->belongsToMany('App\Model\Ads', 'adscountry', 'country_id', 'ads_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\User', 'usercountry', 'country_id', 'user_id');
    }
}
