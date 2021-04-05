<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdsRequest;
use App\Model\{
    Ads, Category
};
use Illuminate\Http\Request;
use App\User;

class AdsController extends Controller
{
    public function __cinstruct(Ads $model)
    {
        $this->model = $model;
    }

    public function adsCreate(AdsRequest $request)
    {
        $res = Ads::createAds($request->validated(), $request);
        if($res) {
            $res->category()->attach($request->category);
            $res->user()->attach($request->userId);
            return 'Ваше объявление успешно опубликовано.';
        }
    }

    public function getMyads(Ads $adsM, Request $request)
    {
        $user = User::find($request->id);
        $ads = $user->ads()->orderBy('id', 'desc')->get();
        return $ads;
    }

    public function getBrand()
    {
        $result = '<div class="row">';
        foreach(Category::has('ads')->get() as $brand){
            $result .= '<div class="col-md-3 col-6 mb-1">
                        <a href="'.route('categoryCard', ['id'=>$brand->id]).'">
                            <strong>'.$brand->head.'</strong>
                        </a>
                    </div>';
        }
        $result .= '</div>';
        return $result;
    }
}
