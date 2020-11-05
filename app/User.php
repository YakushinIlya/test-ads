<?php

namespace App;

use App\Helpers\Seo;
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
        'first_name', 'last_name', 'avatar', 'social', 'contacts', 'info', 'phone', 'email', 'status', 'password', 'deleted_at',
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

    public static function genPass($lenght=8)
    {
        $password = '';
        $strkey = '012346789abcdfghjkmnpqrtvwxyzABCDFGHJKLMNPQRTVWXYZ';
        for ($i=0; $i<$lenght; $i++) {
            $rand = rand(1, strlen($strkey)-1);
            $password .= $strkey[$rand];
        }
        return $password;
    }

    public function updateAvatar($data, $data2)
    {
        if($data2->hasFile('avatar')) {
            $fileExt = $data2->file('avatar')->getClientOriginalExtension();
            $destinationPath = '../public/uploads/user/avatars/';
            $fileName = md5($data2['id'].time()) . '.' . $fileExt;
//                $disk = Storage::disk('public');
//                $destinationPath = $disk->put($fileName, $request->file('images'));
            $data2->file('avatar')->move($destinationPath, $fileName);
            Seo::getAvatar($destinationPath.$fileName, 300, 300);
        }
        $avatar = !empty($fileName) ? $fileName : 'no_photo.jpg';
        if(parent::update(['avatar'=>$avatar])){
            return $avatar;
        }
        return false;
    }

    public function isAdmin()
    {
        if($this->roles()->get()[0]->level<config('ads.roles.minAdmin')){
            return false;
        } else {
            return true;
        }
    }

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
