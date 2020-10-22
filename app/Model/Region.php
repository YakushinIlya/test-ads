<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';

    protected $fillable = [
        'id_country', 'old', 'region_name_ru', 'region_name_en'
    ];

    public function ads()
    {
        return $this->belongsToMany('App\Model\Ads', 'adsregion', 'region_id', 'ads_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\User', 'userregion', 'region_id', 'user_id');
    }
}
