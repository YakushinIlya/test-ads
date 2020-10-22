<?php

namespace App\Http\Controllers\ADS;

use App\Model\Ads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function getAdd()
    {
        $data = [
            'content' => view('front.form.adsAdd'),
        ];
        return view('home', $data);
    }

    public function getCard($id)
    {
        $ads = Ads::find($id);
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
}
