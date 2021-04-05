<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Model\{
    Ads, Category, Region, Page
};
use App\Helpers\Seo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $colors = [
        '#FFFF00', '#996633', '#CC0000', '#990033', '#993366', '#FF00FF', '#996699', '#660099', '#330099', '#000099',
        '#003399', '#0099CC', '#00FFFF', '#009966', '#339933', '#33CC33', '#669933', '#666633', '#333333', '#CCCCCC',
        '#CCCC33', '#99FF33', '#66FF33', '#99CC99', '#33FF99', '#66FFCC', '#66CCCC', '#3399FF', '#3366FF', '#6666FF',
        '#9966FF', '#CC33FF', '#CC66CC', '#FF00CC', '#FF3366', '#FF9999', '#FF9966', '#FFCC00', '#000000', '#FFFFFF',
    ];

    public $colors2 = [
        '#CCCC00', '#663300', '#660000', '#CC0033', '#663333', '#330066', '#000066', '#336666', '#006633', '#003300',
        '#336600', '#333300', '#000000', '#666666', '#00CC99', '#00CCFF', '#3366CC', '#9966FF', '#CC3333', '#FFCC33',
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /* Ads::where('head', '!=', '')->delete();
         * $ads = Ads::all();

        foreach($ads as $a){
            $url = Seo::genUrl($a->head);
            Ads::find($a->id)->update([
                'url' => $url
            ]);
        }*/
        $ads = new Ads;
        $data = [
            'content' => view('front.index', [
                //'category_list' => Category::where('level', '>', 0)->orderBy('id', 'asc')->get(),
                //'category_list' => Category::has('ads')->get(),
                'ads_list' => $ads->where('deleted_at', null)
                    ->orWhere('deleted_at', '>', now())
                    ->orderBy('id', 'desc')
                    ->limit(160)
                    ->paginate(config('view.ads.paginate')),
                'colors' => $this->colors2,
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }

    public function page($url)
    {
        if($page = Page::where('url', $url)->first()) {
            $data = [
                'title' => $page->title,
                'content' => view('front.page', [
                    'page' => $page,
                ]),
            ];
            return view('home', $data);
        } else {
            return redirect()->route('pageError', ['code'=>404]);
        }
    }

    public function pageError($code)
    {
        $data = [
            'content' => view('error.'.$code, ['code'=>$code]),
        ];
        return response()->view('home', $data, 404);
    }

    public function getSell()
    {
        $ads = new Ads;
        $data = [
            'content' => view('front.index', [
                'ads_list' => $ads->where('status', 'sell')
                    ->whereNull('deleted_at')
                    ->orderBy('id', 'desc')
                    ->limit(300)
                    ->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }

    public function getBuy()
    {
        $ads = new Ads;
        $data = [
            'content' => view('front.index', [
                'ads_list' => $ads->where('status', 'buy')
                    ->whereNull('deleted_at')
                    ->orderBy('id', 'desc')
                    ->limit(300)
                    ->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
