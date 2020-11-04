<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group([
    'middleware' => ['auth'],
], function(){
    Route::get('/profile', 'Profile\ProfileController@index')->name('profile');
    Route::match(['get', 'post'],'/profile/edit', 'Profile\ProfileController@edit')->name('profileEdit');
    Route::get('/profile/myads', 'Profile\ProfileController@myAds')->name('profileMyAds');

    Route::match(['get', 'post'],'/ads/create', 'Ads\AdsController@getCreate')->name('adsCreate');
    Route::match(['get', 'post'], '/ads/update/{id?}', 'Ads\AdsController@getUpdate')->name('adsUpdate');
    Route::get('/ads/delete/{id}', 'Ads\AdsController@getDelete')->name('adsDelete');
});

Route::get('/', 'HomeController@index')->name('home');
Route::match(['get', 'post'], '/search', 'SearchController@index')->name('search');

Route::group([
    'namespace' => 'Ads',
], function(){
Route::get('/ads/{id}', 'AdsController@getCard')->name('adsCard');
Route::get('/category/{id}', 'CategoryController@getCard')->name('categoryCard');
Route::get('/country/{id}', 'GeoController@getCountry')->name('country');
Route::get('/region/{id}', 'GeoController@getRegion')->name('region');
Route::get('/city/{id}', 'GeoController@getCity')->name('city');
});

Route::group([
    'prefix'=>'adminads',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin'],
], function(){
    Route::get('panel', 'AdminController@panel')->name('adminPanel');

    Route::get('users', 'UsersController@getAll')->name('adminUsersAll');
    Route::match(['get', 'post'],'users/create', 'UsersController@getCreate')->name('adminUsersCreate');
    Route::match(['get', 'post'],'users/update/{id}', 'UsersController@getUpdate')->where('id', '[0-9]+')->name('adminUsersUpdate');
    Route::get('users/delete/{id}', 'UsersController@getDelete')->where('id', '[0-9]+')->name('adminUsersDelete');

    Route::get('categories', 'CategoriesController@getAll')->name('adminCategoriesAll');
    Route::match(['get', 'post'],'categories/create', 'CategoriesController@getCreate')->name('adminCategoryCreate');
    Route::match(['get', 'post'],'categories/update/{id}', 'CategoriesController@getUpdate')->where('id', '[0-9]+')->name('adminCategoryUpdate');
    Route::get('categories/delete/{id}', 'CategoriesController@getDelete')->where('id', '[0-9]+')->name('adminCategoryDelete');

    Route::get('ads', 'AdsController@getAll')->name('adminAdsAll');
    Route::match(['get', 'post'],'ads/create', 'AdsController@getCreate')->name('adminAdsCreate');
    Route::match(['get', 'post'],'ads/update/{id}', 'AdsController@getUpdate')->where('id', '[0-9]+')->name('adminAdsUpdate');
    Route::get('ads/delete/{id}', 'AdsController@getDelete')->where('id', '[0-9]+')->name('adminAdsDelete');
});
