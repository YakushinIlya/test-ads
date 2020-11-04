<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\Category;
use App\Model\City;
use App\Helpers\Ads as AdsHelp;
use App\Model\Ads;
use Validator;

class AdsController extends Controller
{
    public function getAll()
    {
        $data = [
            'title' => 'Категории',
            'content' => view('admin.content.adsList', [
                'adsList' => Ads::orderBy('id', 'desc')->paginate(100),
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function getCreate(Request $request)
    {
        if($request->isMethod('post')) {
            return AdsHelp::createAdsAdmin($request);
        }
        $data = [
            'title' => 'Создание объявления',
            'content' => view('admin.content.adsCreate', [
                'categories' => Category::all(),
                'countryList' => Country::all(),
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function getUpdate(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->except('_token');
            $validator = $this->validator($data);
            if($validator->fails()) {
                return redirect()->route('adminAdsUpdate', ['id'=>$id])->withInput()->withErrors($validator);
            }
            if(Ads::find($id)->update($request->all())) {
                return redirect()->route('adminAdsAll')->with('status', 'Объявление успешно обновлено');
            }
        }
        $data = [
            'title' => 'Редактирование объявления',
            'content' => view('admin.content.adsUpdate', [
                'ads' => Ads::find($id),
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function getDelete($id)
    {
        Ads::find($id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('adminAdsAll')->with('status', 'Объявление успешно удалено');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title'  => 'nullable|string',
            'description'  => 'nullable|string',
            'keywords'  => 'nullable|string',
            'country'  => 'nullable|string',
            'region'  => 'nullable|string',
            'city'  => 'nullable|string',
            'category'  => 'nullable|string',
            'avatar'  => 'nullable|image',
            'head'  => 'required|string',
            'body'  => 'required|string',
            'price'  => 'required|numeric',
        ]);
    }
}
