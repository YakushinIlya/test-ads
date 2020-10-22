<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __cinstruct(User $model)
    {
        $this->model = $model;
    }

    public function getEdit(ProfileRequest $request)
    {
        $user = User::find($request->id);
        $day = $user->update($request->validated());
        if($day) {
            return 'Ваш профиль успешно обновлен.';
        }
    }
}
