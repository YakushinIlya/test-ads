<?php

namespace App\Http\Controllers;

use App\Model\Ads;
use App\Model\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
                'ads_list' => Ads::where('level', '>', 0)->orderBy('id', 'desc')->get(),
            ]),
        ];
        return view('home', $data);
    }
}
