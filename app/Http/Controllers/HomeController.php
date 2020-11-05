<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Model\{
    Ads, Category
};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $colors = [

    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'content' => view('front.index', [
                'category_list' => Category::where('level', '>', 0)->orderBy('id', 'desc')->get(),
                'ads_list' => Ads::where('deleted_at', null)
                    ->orWhere('deleted_at', '>', now())
                    ->orderBy('id', 'desc')
                    ->limit(300)
                    ->paginate(config('view.ads.paginate')),
                'colors' => $this->colors,
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
