<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileImgRequest;
use App\User;

class ProfileController extends Controller
{
    public function __cinstruct(User $model)
    {
        $this->model = $model;
    }

    public function getEdit(ProfileRequest $request)
    {
        $user = User::find($request->id);
        $res = $user->update($request->validated());
        if($res) {
            return 'Ваш профиль успешно обновлен.';
        }
    }

    public function getImg(ProfileImgRequest $request)
    {
        $user = User::find($request->id);
        $res = $user->updateAvatar($request->validated(), $request);
        return $res;
    }
}
