<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use App\Model\Ads as AdsModel;
use Validator;

class Ads
{
    public static function createAds($request)
    {
        $user = Auth::user();
        $data = $request->except('_token');
        $validator = self::validator($data);
        if ($validator->fails()) {
            return redirect()->route('adsCreate')->withInput()->withErrors($validator);
        }
        if ($res = AdsModel::createAds($data, $request)) {
            $res->category()->attach($request->category);
            $res->user()->attach($user->id);
            $res->country()->attach($user->country);
            $res->region()->attach($user->region);
            $res->city()->attach($user->city);
            return redirect()->route('profileMyAds')->with('status', 'Объявление успешно добавлено.');
        }
    }

    public static function createAdsAdmin($request)
    {
        $user = Auth::user();
        $data = $request->except('_token');
        $validator = self::validator($data);
        if ($validator->fails()) {
            return redirect()->route('adminAdsCreate')->withInput()->withErrors($validator);
        }
        if ($res = AdsModel::createAds($data, $request)) {
            $res->category()->attach($request->category);
            $res->user()->attach($user->id);
            $res->country()->attach($request->country);
            $res->region()->attach($request->region);
            $res->city()->attach($request->city);
            return redirect()->route('adminAdsAll')->with('status', 'Объявление успешно добавлено.');
        }
    }

    public static function updateAds($request, $ads, $id)
    {
        $data = $request->except('_token');
        $validator = self::validator($data);
        if ($validator->fails()) {
            return redirect()->route('adsUpdate', ['id'=>$id])->withInput()->withErrors($validator);
        }
        if ($res = AdsModel::updateAds($data, $ads, $request)) {
            return redirect()->route('adsUpdate', ['id'=>$id])->with('status', 'Объявление успешно обновлено.');
        }
    }

    public static function validator(array $data) {
        return Validator::make($data, [
            'head' => 'required|string',
            'body' => 'required|string',
            'price' => 'required|numeric',
        ]);
    }
}