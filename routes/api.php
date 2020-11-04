<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/region', 'api\GeoController@getRegion')->name('region');
Route::post('/city', 'api\GeoController@getCity')->name('city');

Route::post('/adsadd', 'api\AdsController@adsCreate')->name('adsAdd');
Route::post('/page', 'api\PageController@getPage')->name('page');

Route::put('/profile/edit', 'api\ProfileController@getEdit')->name('profileEdit');
Route::post('/profile/img', 'api\ProfileController@getImg')->name('profileImg');
Route::post('/profile/myads', 'api\AdsController@getMyads')->name('myads');