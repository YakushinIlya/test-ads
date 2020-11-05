<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\Profile;
use App\Model\Country;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /*$city1 = City1::where('id', '>', 0)->orderBy('id', 'asc')->get();
        foreach($city1 as $c){
            City::create([
                'id_region' => $c->id_region,
                'id_country' => $c->id_country,
                'old' => $c->oid,
                'city_name_ru' => $c->city_name_ru,
                'city_name_en' => $c->city_name_en,
            ]);
        }*/
        $data = [
            'content' => view('front.profile', [
                'user' => Auth::user(),
                'country' => Country::all(),
            ]),
        ];
        return view('profile', $data);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $userModel = User::find($user->id);
        if($request->isMethod('post')) {
            return Profile::updateProfile($request);
        }
        $data = [
            'content' => view('front.form.profileEdit', [
                'userModel' => $userModel,
                'userCountry' => $userModel->country()->get(),
                'userRegion' => $userModel->region()->get(),
                'userCity' => $userModel->city()->get(),
                'user' => $user,
                'countryList' => Country::all(),
            ]),
        ];
        return view('profile', $data);
    }

    public function myAds()
    {
        $user = Auth::user();
        $data = [
            'content' => view('front.adsList', [
                'str' => new Str,
                'adsList' => $user->ads()->where('deleted_at', null)->orWhere('deleted_at', '>', Carbon::now())->orderBy('id', 'desc')->paginate(config('view.ads.paginate')),
            ]),
        ];
        return view('profile', $data);
    }
}
