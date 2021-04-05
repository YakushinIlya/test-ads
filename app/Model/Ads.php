<?php

namespace App\Model;

use App\Helpers\Seo;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';

    protected $fillable = [
        'title', 'description', 'keywords', 'url', 'head', 'body', 'brands', 'price', 'phone', 'username', 'avatar',
        'photo', 'geo', 'year', 'motor', 'conditioncar', 'bodycar', 'numbervin', 'userpts', 'door', 'mileage',
        'city', 'params', 'level', 'status', 'views', 'deleted_at'
    ];

    public static function createAds($data, $data2)
    {
        $i = 0;
        $photoMore = [];
        $paramsData = [];
        if($data2->hasFile('avatar')) {
            $fileExt = $data2->file('avatar')->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/ads/';
            $fileName = md5($data2['userId'].$data2['category'].$data2['head'].date('Y-m-d_H:i:m')) . '.' . $fileExt;
            $data2->file('avatar')->move($destinationPath, $fileName);
            Seo::getAvatar($destinationPath.$fileName, 800, 500);
        }
        if(isset($data2->file('photo')[$i])) {
            foreach($data2['photo'] as $photo){
                $fileExt = $data2->file('photo')[$i]->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/ads/';
                $fileName = md5($photo->getClientOriginalName().$data2['category'].$data2['head'].date('Y-m-d_H:i:m')) . '.' . $fileExt;
                $data2->file('photo')[$i]->move($destinationPath, $fileName);
                Seo::getAvatar($destinationPath.$fileName, 800, 500);
                $photoMore[] = $fileName;
                $i++;
            }
        }

        if(!empty($data['category'])){
            $paramsData[] = [
                'name' => 'Марка автомобиля',
                'value' => $data['category'],
            ];
        }
        if(!empty($data['year'])){
            $paramsData[] = [
                'name' => 'Год выпуска',
                'value' => $data['year'],
            ];
        }
        if(!empty($data['motor'])){
            $paramsData[] = [
                'name' => 'Тип двигателя',
                'value' => $data['motor'],
            ];
        }
        if(!empty($data['conditioncar'])){
            $paramsData[] = [
                'name' => 'Состояние',
                'value' => $data['conditioncar'],
            ];
        }
        if(!empty($data['bodycar'])){
            $paramsData[] = [
                'name' => 'Тип кузова',
                'value' => $data['bodycar'],
            ];
        }
        if(!empty($data['numbervin'])){
            $paramsData[] = [
                'name' => 'VIN или номер кузова',
                'value' => $data['numbervin'],
            ];
        }
        if(!empty($data['mileage'])){
            $paramsData[] = [
                'name' => 'Пробег КМ',
                'value' => $data['mileage'],
            ];
        }
        if(!empty($data['userpts'])){
            $paramsData[] = [
                'name' => 'Владельцев по ПТС',
                'value' => $data['userpts'],
            ];
        }
        if(!empty($data['door'])){
            $paramsData[] = [
                'name' => 'Количество дверей',
                'value' => $data['door'],
            ];
        }

        $data['title'] = Seo::genTitle($data['head'], $data['body'], $data['city_name'], $data['status']);
        $data['description'] = Seo::genDescription($data['head'], $data['body'], $data['city_name'], $data['status']);
        $data['keywords'] = Seo::genKeywords($data['head'], $data['body'], $data['city_name'], $data['status']);
        $data['url'] = Seo::genUrl($data['head'].' '.$data['city_name']);
        $data['body'] = base64_encode($data['body']);
        $data['brand'] = $data['category'];
        $data['avatar'] = !empty($fileName) ? $fileName : 'no_photo.jpg';
        $data['params'] = base64_encode(json_encode($paramsData, JSON_BIGINT_AS_STRING));
        $data['photo'] = empty($photoMore) ? null : base64_encode(json_encode($photoMore, JSON_BIGINT_AS_STRING));
        $data['level'] = 1;
        return parent::create($data);
    }

    public static function updateAds($data, $ads, $data2)
    {
        $paramsData = [];
        if($data2->hasFile('avatar')) {
            $fileExt = $data2->file('avatar')->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/ads/';
            $fileName = md5($data2['userId'].$data2['category'].$data2['head'].date('Y-m-d_H:i:m')) . '.' . $fileExt;
            $data2->file('avatar')->move($destinationPath, $fileName);
            Seo::getAvatar($destinationPath.$fileName, 800, 500);
        }

        if(!empty($data['category'])){
            $paramsData[] = [
                'name' => 'Марка автомобиля',
                'value' => $data['category'],
            ];
        }
        if(!empty($data['year'])){
            $paramsData[] = [
                'name' => 'Год выпуска',
                'value' => $data['year'],
            ];
        }
        if(!empty($data['motor'])){
            $paramsData[] = [
                'name' => 'Тип двигателя',
                'value' => $data['motor'],
            ];
        }
        if(!empty($data['conditioncar'])){
            $paramsData[] = [
                'name' => 'Состояние',
                'value' => $data['conditioncar'],
            ];
        }
        if(!empty($data['bodycar'])){
            $paramsData[] = [
                'name' => 'Тип кузова',
                'value' => $data['bodycar'],
            ];
        }
        if(!empty($data['numbervin'])){
            $paramsData[] = [
                'name' => 'VIN или номер кузова',
                'value' => $data['numbervin'],
            ];
        }
        if(!empty($data['mileage'])){
            $paramsData[] = [
                'name' => 'Пробег КМ',
                'value' => $data['mileage'],
            ];
        }
        if(!empty($data['userpts'])){
            $paramsData[] = [
                'name' => 'Владельцев по ПТС',
                'value' => $data['userpts'],
            ];
        }
        if(!empty($data['door'])){
            $paramsData[] = [
                'name' => 'Количество дверей',
                'value' => $data['door'],
            ];
        }

        $data['title'] = Seo::genTitle($data['head'], $data['body'], $data['city_name'], $data['status']);
        $data['description'] = Seo::genDescription($data['head'], $data['body'], $data['city_name'], $data['status']);
        $data['keywords'] = Seo::genKeywords($data['head'], $data['body'], $data['city_name'], $data['status']);
        $data['url'] = Seo::genUrl($data['head'].' '.$data['city_name']);
        $data['body'] = base64_encode($data['body']);
        $data['brand'] = $data['category'];
        $data['avatar'] = $fileName ?? $ads['avatar'] ?? 'no_photo.jpg';
        $data['params'] = base64_encode(json_encode($paramsData, JSON_BIGINT_AS_STRING));
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
