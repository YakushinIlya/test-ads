<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title', 'description', 'keywords', 'url', 'head', 'body', 'icon', 'level', 'views', 'deleted_at'
    ];
}
