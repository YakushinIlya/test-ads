<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'avatar', 'social', 'contacts', 'phone', 'email', 'status', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'status_time_end' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Model\Roles', 'userlevel', 'user_id', 'role_id');
    }

    public function ads()
    {
        return $this->belongsToMany('App\Model\Ads', 'adsuser', 'user_id', 'ads_id');
    }

    public function country()
    {
        return $this->belongsToMany('App\Model\Country', 'usercountry', 'user_id', 'country_id');
    }

    public function region()
    {
        return $this->belongsToMany('App\Model\Region', 'userregion', 'user_id', 'region_id');
    }

    public function city()
    {
        return $this->belongsToMany('App\Model\City', 'usercity', 'user_id', 'city_id');
    }
}
