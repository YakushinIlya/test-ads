<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Ads as AdsHelp;
use App\Helpers\Seo;
use App\Model\{
    Ads, Adscategory, Adscountry, Adsregion, Adscity, Adsuser, Country, Category
};
use Validator;

class AdsController extends Controller
{
    public function getAll()
    {
        $data = [
            'title' => 'Объявления',
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
            $request['avatar'] = 'no_photo.jpg';
            if($request->hasFile('avatar')) {
                $fileExt = $request->file('avatar')->getClientOriginalExtension();
                $destinationPath = '../public/uploads/ads/';
                $fileName = md5($request['head'].date('Y-m-d_H:i:m')) . '.' . $fileExt;
                $request->file('avatar')->move($destinationPath, $fileName);
                Seo::getAvatar($destinationPath.$fileName, 800, 500);
                $request['avatar'] = $fileName;
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
        $ads = Ads::find($id);
        $ads->update([
            'deleted_at' => now()
        ]);

        return redirect()->route('adminAdsAll')->with('status', 'Объявление успешно удалено в корзину');
    }

    public function getDeleteNew($id)
    {
        $ads = Ads::find($id);
        Adscategory::where('ads_id', $id)->delete();
        Adscountry::where('ads_id', $id)->delete();
        Adsregion::where('ads_id', $id)->delete();
        Adscity::where('ads_id', $id)->delete();
        Adsuser::where('ads_id', $id)->delete();
        $ads->delete();
        return redirect()->route('adminAdsAll')->with('status', 'Объявление успешно удалено навсегда и безвозвратно');
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
