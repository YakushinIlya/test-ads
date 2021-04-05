<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Model\{
    Region, City
};
use Carbon\Carbon;
use App\User;
use App\Helpers\{
    Profile, Seo
};
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->regionList = Region::where('id_country', 1)->get();
    }

    public function index()
    {
        $user = Auth::user();

        //City::where('old', '>', '0')->delete();
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
            'regionList' => $this->regionList,
            'content' => view('front.form.profileEdit', [
                'regionList' => $this->regionList,
                'userModel' => $userModel,
                'userRegion' => $userModel->region()->get(),
                'userCity' => $userModel->city()->get(),
                'user' => $user,
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

    public function avatarDown(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if($request->hasFile('avatarUser')) {
            $fileExt = $request->file('avatarUser')->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/user/avatars/';
            $fileName = md5($id.time()) . '.' . $fileExt;
            $request->file('avatarUser')->move($destinationPath, $fileName);
            Seo::getAvatar($destinationPath.$fileName, 300, 300);
            $avatar = !empty($fileName) ? $fileName : 'no_photo.jpg';
            @unlink($destinationPath.$user->avatar);

            if($user->update(['avatar'=>$avatar])){
                return $avatar;
            }
        }
        return 'Ошибка загрузки';
    }
}
