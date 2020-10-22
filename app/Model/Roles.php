<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name', 'description', 'level'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User', 'userlevel', 'role_id', 'user_id');
    }
}
