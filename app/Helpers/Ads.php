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
        $city_name = $user->city()->select('city_name_ru')->first()['city_name_ru'];
        if ($validator->fails()) {
            return redirect()->route('adsCreate')->withInput()->withErrors($validator);
        }
        $data['city_name'] = $city_name;
        $data['city'] = $city_name;
        if ($res = AdsModel::createAds($data, $request)) {
            $res->category()->attach($request->category);
            $res->user()->attach($user->id);
            $res->country()->attach($user->country()->first()['id']);
            $res->region()->attach($user->region()->first()['id']);
            $res->city()->attach($user->city()->first()['id']);
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
        $user = Auth::user();
        $data = $request->except('_token');
        $validator = self::validator($data);
        if ($validator->fails()) {
            return redirect()->route('adsUpdate', ['id'=>$id])->withInput()->withErrors($validator);
        }
        $data['city_name'] = $user->city()->select('city_name_ru')->first()->city_name_ru;
        if ($res = AdsModel::updateAds($data, $ads, $request)) {
            return redirect()->route('adsUpdate', ['id'=>$id])->with('status', 'Объявление успешно обновлено.');
        }
    }

    public static function validator(array $data) {
        return Validator::make($data, [
            'status' => 'required|string',
            'head' => 'required|string',
            'category' => 'required|numeric',
            'year' => 'required|numeric',
            'motor' => 'required|string',
            'conditioncar' => 'nullable|string',
            'bodycar' => 'nullable|string',
            'numbervin' => 'required|string',
            'mileage' => 'nullable|numeric',
            'userpts' => 'nullable|numeric',
            'door' => 'nullable|numeric',
            'body' => 'required|string',
            'price' => 'required|numeric',
        ]);
    }
}