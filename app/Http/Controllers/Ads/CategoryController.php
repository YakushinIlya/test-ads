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
            'title' => $cat['title'].' - купить или продать автомобиль',
            'description' => 'Бесплатные объявления о покупке и продаже автомобилей '.$cat['description'].'. Купить или продать автомобиль '.$cat['description'].' бесплатно на market-cars.ru.',
            'keywords' => 'купить, продать, автомобиль, '.$cat['keywords'],
            'content' => view('front.categoryCard', [
                'category' => $cat,
                'ads_list' => $cat->ads()->whereNull('deleted_at')->orderBy('id', 'desc')->paginate(config('view.ads.paginate')),
                'str' => new Str,
            ]),
        ];
        return view('home', $data);
    }
}
