<?php

namespace App\Http\Controllers\Ads;

use Illuminate\Support\Str;
use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCard($id)
    {
        $cat = Category::find($id);
        $data = [
            'title' => $cat['title'],
            'description' => $cat['description'],
            'keywords' => $cat['keywords'],
            'content' => view('front.categoryCard', [
                'category' => $cat,
                'ads_list' => $cat->ads()->orderBy('id', 'desc')->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
