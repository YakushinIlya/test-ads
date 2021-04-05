<?php

namespace App\Http\Controllers\Ads;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getCard($id)
    {
        $user = User::find($id);
        $data = [
            'title' => $user['first_name'].' '.$user['last_name'],
            'description' => 'Список объявлений пользователя '.$user['first_name'].' '.$user['last_name'],
            'keywords' => 'объявления, список, '.$user['first_name'].', '.$user['last_name'],
            'content' => view('front.userCard', [
                'user' => $user,
                'ads_list' => $user->ads()->whereNull('deleted_at')->orderBy('id', 'desc')->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
