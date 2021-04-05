<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\{
    Region, City
};
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

    public function getRegionAuto()
    {
        $result = '<div class="row">';
        foreach(Region::has('ads')->orderBy('region_name_ru')->get() as $region){
            $result .= '<div class="col-md-4 col-12 mb-1">
                        <a href="'.route('region', ['id'=>$region->id]).'">
                            <strong>'.$region->region_name_ru.'</strong>
                        </a>
                    </div>';
        }
        $result .= '</div>';
        return $result;
    }

    public function getCityAuto()
    {
        $result = '<div class="row">';
        foreach(City::has('ads')->orderBy('city_name_ru')->get() as $city){
            $result .= '<div class="col-md-4 col-12 mb-1">
                        <a href="'.route('city', ['id'=>$city->id]).'">
                            <strong>'.$city->city_name_ru.'</strong>
                        </a>
                    </div>';
        }
        $result .= '</div>';
        return $result;
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

    public function getCityPars(Request $request)
    {
        $res = City::where('old_region', $request->region)->get();

        $htmlData = '<option selected disabled>-- Выберите город --</option>';
        foreach($res as $city) {
            $htmlData .= '<option value="'.$city->old.'">'.$city->city_name_ru.'</option>';
        }

        return $htmlData;
    }
}
