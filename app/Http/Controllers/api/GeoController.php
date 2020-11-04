<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Region;
use App\Model\City;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function getRegion(Request $request)
    {
        $res = Region::where('id_country', $request->country)->get();

        $htmlData = '<option selected disabled>-- Выберите регион --</option>';
        foreach($res as $region) {
            $htmlData .= '<option value="'.$region->id.'">'.$region->region_name_ru.'</option>';
        }

        return $htmlData;
    }

    public function getCity(Request $request)
    {
        $res = City::where('id_region', $request->region)->get();

        $htmlData = '<option selected disabled>-- Выберите город --</option>';
        foreach($res as $city) {
            $htmlData .= '<option value="'.$city->id.'">'.$city->city_name_ru.'</option>';
        }

        return $htmlData;
    }
}
