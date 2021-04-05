<?php

namespace App\Http\Controllers\Ads;

use App\Model\{
    Ads, Category
};
use App\Helpers\Ads as AdsHelp;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AdsController extends Controller
{
    public function getCreate(Request $request)
    {
        if($request->isMethod('post')) {
            return AdsHelp::createAds($request);
        }
        $data = [
            'content' => view('front.form.adsAdd', [
                'user' => Auth::user(),
                'categories' => Category::select(['id', 'head'])->orderBy('id', 'asc')->get(),
            ]),
        ];
        return view('profile', $data);
    }

    public function getCard($id)
    {
        $url = explode('_', $id);
        $adsObj = new Ads;
        $ads = $adsObj->whereRaw('id=? && url=?', [$url[0], $url[1]])->whereNull('deleted_at')->get()->first();
        if(is_null($ads)) {
            return redirect()->route('home')->withErrors(['message'=>'Объявление не найдено']);
        }
        $adsFind = $adsObj->find($ads->id);
        $adsFind->increment('views', 1);
        $data = [
            'title' => $ads->title,
            'description' => $ads->description,
            'keywords' => $ads->keywords,
            'content' => view('front.adsCard', [
                'us' => $adsFind->user()->get()->first(),
                'ads' => $ads,
            ]),
        ];
        return view('home', $data);
    }

    public function getUpdate(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $adsUp = $user->ads()->where('ads.id', $id)->first();
        if(empty($adsUp)) {
            return redirect()->route('profileMyAds')->withErrors(['message'=>'Нет доступа']);
        }
        $ads = Ads::find($id);
        if($request->isMethod('post')) {
            return AdsHelp::updateAds($request, $ads, $id);
        }
        $data = [
            'title' => $ads['Редактирование объявления'],
            'content' => view('front.form.adsUpdate', [
                'ads' => $ads,
                'categories' => Category::all(),
                'motor' => [
                    'Бензин',
                    'Газ',
                    'Дизель',
                    'Электрический',
                    'Другое',
                ],
                'condition' => [
                    'Не битый',
                    'Битый'
                ],
                'bodycar' => [
                    'Кроссовер',
                    'Внедорожник',
                    'Пикап',
                    'Хетчбэк',
                    'Седан',
                    'Минивен',
                    'Родстер',
                    'Кабриолет',
                    'Купе',
                    'Лимузин',
                ],
            ]),
        ];
        return view('profile', $data);
    }

    public function getDelete($id)
    {
        Ads::find($id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('profileMyAds')->with('status', 'Объявление успешно удалено');
    }
}
