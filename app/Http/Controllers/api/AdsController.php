<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdsRequest;
use App\Model\Ads;
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
}
