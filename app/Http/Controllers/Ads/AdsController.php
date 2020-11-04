<?php

namespace App\Http\Controllers\Ads;

use App\Model\Ads;
use App\Model\Category;
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
                'categories' => Category::select(['id', 'head'])->orderBy('id', 'desc')->get(),
            ]),
        ];
        return view('profile', $data);
    }

    public function getCard($id)
    {
        $ads = Ads::find($id);
        $ads->increment('views', 1);
        $data = [
            'title' => $ads['title'],
            'description' => $ads['description'],
            'keywords' => $ads['keywords'],
            'content' => view('front.adsCard', [
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
