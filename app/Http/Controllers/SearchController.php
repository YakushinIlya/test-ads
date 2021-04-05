<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Model\{
    Ads, Region, City
};
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $ads = new Ads;
        $query = $request->input('query');
        $region = $request->input('region');
        $city = $request->input('city');
        if(is_string($query) && !empty($query)) {
            if($region=='all' && $city=='all' || $region=='all' && $city==null){
                $res = $ads->where('head', 'like', '%'.$query.'%')
                    ->orWhere('body', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(config('view.ads.paginate'));
            } elseif(!empty($region) && empty($city)){
                $region = Region::find($region);
                $res = $region->ads()
                    ->where('head', 'like', '%'.$query.'%')
                    ->orWhere('body', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(config('view.ads.paginate'));
            } elseif(!empty($region) && !empty($city)){
                $city = City::find($city);
                if(empty($query)) {
                    $res = $city->ads()
                        ->select('*')
                        ->orderBy('id', 'desc')
                        ->paginate(config('view.ads.paginate'));
                } else {
                    $res = $city->ads()
                        ->where('head', 'like', '%'.$query.'%')
                        ->orWhere('body', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')
                        ->paginate(config('view.ads.paginate'));
                }
            }
        } elseif(!empty($city) && $city!='all') {
            return redirect()->route('city', ['id'=>$city]);
        } elseif((!empty($region) && empty($city)) && $region!='all') {
            return redirect()->route('region', ['id'=>$region]);
        } elseif($region=='all' || $city=='all') {
            return redirect()->route('home')->with('warning', 'Все доступные объявления нашего сайта');
        }
        $data = [
            'content' => view('front.search', [
                'ads_list' => $res??'',
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
