<?php

namespace App\Model;

use App\Helpers\Seo;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';

    protected $fillable = [
        'title', 'description', 'keywords', 'head', 'body', 'price', 'avatar', 'photo', 'geo', 'level', 'views', 'deleted_at'
    ];

    public static function createAds($data, $data2)
    {
        if($data2->hasFile('avatar')) {
            $fileExt = $data2->file('avatar')->getClientOriginalExtension();
            $destinationPath = '../public/uploads/ads/';
            $fileName = md5($data2['userId'].$data2['category'].$data2['head'].date('Y-m-d_H:i:m')) . '.' . $fileExt;
            $data2->file('avatar')->move($destinationPath, $fileName);
            Seo::getAvatar($destinationPath.$fileName, 800, 500);
        }

        $data['title'] = Seo::genTitle($data['head'], $data['body']);
        $data['description'] = Seo::genDescription($data['head'], $data['body']);
        $data['keywords'] = Seo::genKeywords($data['head'], $data['body']);
        $data['avatar'] = !empty($fileName) ? $fileName : 'no_photo.jpg';
        $data['level'] = 1;
        return parent::create($data);
    }

    public static function updateAds($data, $ads, $data2)
    {
        if($data2->hasFile('avatar')) {
            $fileExt = $data2->file('avatar')->getClientOriginalExtension();
            $destinationPath = '../public/uploads/ads/';
            $fileName = md5($data2['userId'].$data2['category'].$data2['head'].date('Y-m-d_H:i:m')) . '.' . $fileExt;
//                $disk = Storage::disk('public');
//                $destinationPath = $disk->put($fileName, $request->file('images'));
            $data2->file('avatar')->move($destinationPath, $fileName);
            Seo::getAvatar($destinationPath.$fileName, 800, 500);
        }

        $data['title'] = Seo::genTitle($data['head'], $data['body']);
        $data['description'] = Seo::genDescription($data['head'], $data['body']);
        $data['keywords'] = Seo::genKeywords($data['head'], $data['body']);
        $data['avatar'] = $fileName ?? $ads['avatar'] ?? 'no_photo.jpg';
        $data['level'] = 1;
        return parent::find($ads['id'])->update($data);
    }

    public function category()
    {
        return $this->belongsToMany('App\Model\Category', 'adscategory', 'ads_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\User', 'adsuser', 'ads_id', 'user_id');
    }

    public function country()
    {
        return $this->belongsToMany('App\Model\Country', 'adscountry', 'ads_id', 'country_id');
    }

    public function region()
    {
        return $this->belongsToMany('App\Model\Region', 'adsregion', 'ads_id', 'region_id');
    }

    public function city()
    {
        return $this->belongsToMany('App\Model\City', 'adscity', 'ads_id', 'city_id');
    }
}
