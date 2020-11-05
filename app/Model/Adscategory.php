<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Adscategory extends Model
{
    protected $table = 'adscategory';

    protected $fillable = [
        'ads_id', 'cat_id'
    ];
}
