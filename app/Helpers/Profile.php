<?php

namespace App\Helpers;

use App\User;
use Validator;

class Profile
{
    public static function updateProfile($request)
    {
        $data = $request->except('_token');
        $validator = self::validator($data);
        if ($validator->fails()) {
            return redirect()->route('profileEdit')->withInput()->withErrors($validator);
        }
        $user = User::find($request->user()->id);
        $request['info'] = base64_encode($request['info']);
        $user->update($request->all());
        if(empty($user->region()->first()) || empty($user->city()->first())) {
            $user->country()->attach(1);
            $user->region()->attach($request->region);
            $user->city()->attach($request->city);
        }
        if ($user) {
            return redirect()->route('profileEdit')->with('status', 'Данные профиля успешно обновлены.');
        }
    }

    public static function validator(array $data) {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|:max:255',
            'phone' => 'required|string',
            'info' => 'required|string',
        ]);
    }

}