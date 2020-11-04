<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Model\Ads;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        if(is_string($query) && !empty($query)) {
            $ads = Ads::where('head', 'like', '%'.$query.'%')
                ->orWhere('body', 'like', '%'.$query.'%')
                ->orderBy('id', 'desc')
                ->paginate(config('view.ads.paginate'));
        }
        $data = [
            'content' => view('front.search', [
                'result' => $ads??'',
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
