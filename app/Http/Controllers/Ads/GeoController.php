<?php

namespace App\Http\Controllers\Ads;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Country;
use App\Model\Region;
use App\Model\City;
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
                'ads_list' => $country->ads()->orderBy('id', 'desc')->distinct()->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }

    public function getRegion($id)
    {
        $region = Region::find($id);
        $data = [
            'title' => $region['region_name_ru'],
            'description' => $region['region_name_ru'],
            'keywords' => $region['region_name_ru'],
            'content' => view('front.geoCard', [
                'title' => $region['region_name_ru'],
                'ads_list' => $region->ads()->orderBy('id', 'desc')->distinct()->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }

    public function getCity($id)
    {
        $city = City::find($id);
        $data = [
            'title' => $city['city_name_ru'],
            'description' => $city['city_name_ru'],
            'keywords' => $city['city_name_ru'],
            'content' => view('front.geoCard', [
                'title' => $city['city_name_ru'],
                'ads_list' => $city->ads()->orderBy('id', 'desc')->distinct()->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
