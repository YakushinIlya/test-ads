<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City1 extends Model
{
    protected $table = 'city1';

    protected $fillable = [
        'id_country', 'id_region', 'old', 'city_name_ru', 'city_name_en'
    ];
}
