<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'title', 'description', 'keywords', 'head', 'body', 'icon', 'level', 'views', 'deleted_at'
    ];

    public function ads()
    {
        return $this->belongsToMany('App\Model\Ads', 'adscategory', 'category_id', 'ads_id');
    }
}
