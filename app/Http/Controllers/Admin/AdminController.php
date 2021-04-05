<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\{
    Ads, Region, Category
};
use App\Helpers\Seo;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function panel()
    {
        /*return Seo::extBrand2('Mercedes-Benz GLE-класс Coupe 3.0 AT, 2019, 20 500 км');
        $resAds = Ads::whereNull('deleted_at')->offset(38000)->limit(3000)->get();

            foreach($resAds as $ads){
                foreach(Seo::extBrand2($ads->head) as $n){
                    if(!empty($n)) {
                        $ads->category()->attach($n);
                    }
                }
            }*/

        $data = [
            'title' => 'Панель администратора',
            'content' => view('admin.content.panel', [
                'ads' => new Ads,
                'user' => new User,
            ]),
        ];
        return view('admin.panel', $data);
    }
}
