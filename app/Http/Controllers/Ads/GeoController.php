<?php

namespace App\Http\Controllers\Ads;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\{
    Country, Region, City
};
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function getCountry($id)
    {
        $country = Country::find($id);
        $data = [
            'title' => $country['country_name_ru'],
            'description' => $country['country_name_ru'],
            'keywords' => $country['country_name_ru'],
            'content' => view('front.geoCard', [
                'title' => $country['country_name_ru'],
                'ads_list' => $country->ads()->whereNull('deleted_at')->orderBy('id', 'desc')->distinct()->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }

    public function getRegion($id)
    {
        $region = Region::find($id);
        $data = [
            'title' => $region['region_name_ru'].' - покупка и продажа автомобилей',
            'description' => 'Бесплатные объявления о покупке и продаже автомобилей '.$region['region_name_ru'].'. Купить или продать автомобиль бесплатно на market-cars.ru.',
            'keywords' => 'купить, продать, автомобиль, '.$region['region_name_ru'],
            'content' => view('front.geoCard', [
                'id' => $id,
                'title' => $region['region_name_ru'],
                'ads_list' => $region->ads()->whereNull('deleted_at')->orderBy('id', 'desc')->distinct()->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }

    public function getCity($id)
    {
        $city = City::find($id);
        $data = [
            'title' => $city['city_name_ru'].' - покупка и продажа автомобилей',
            'description' => 'Бесплатные объявления о покупке и продаже автомобилей в г. '.$city['city_name_ru'].'. Купить или продать автомобиль бесплатно на market-cars.ru.',
            'keywords' => 'купить, продать, автомобиль, '.$city['city_name_ru'],
            'content' => view('front.geoCard', [
                'title' => $city['city_name_ru'],
                'ads_list' => $city->ads()->whereNull('deleted_at')->orderBy('id', 'desc')->distinct()->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
