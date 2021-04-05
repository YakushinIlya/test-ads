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


Auth::routes(['verify' => true]);

Route::group([
    'middleware' => ['auth', 'verified'],
], function(){
    Route::get('/profile', 'Profile\ProfileController@index')->name('profile');
    Route::match(['get', 'post'],'/profile/edit', 'Profile\ProfileController@edit')->name('profileEdit');
    Route::get('/profile/myads', 'Profile\ProfileController@myAds')->name('profileMyAds');
    Route::post('/profile/avatar', 'Profile\ProfileController@avatarDown');

    Route::match(['get', 'post'],'/ads/create', 'Ads\AdsController@getCreate')->name('adsCreate');
    Route::match(['get', 'post'], '/ads/update/{id?}', 'Ads\AdsController@getUpdate')->name('adsUpdate');
    Route::get('/ads/delete/{id}', 'Ads\AdsController@getDelete')->name('adsDelete');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/sell', 'HomeController@getSell')->name('adsSell');
Route::get('/buy', 'HomeController@getBuy')->name('adsBuy');
Route::match(['get', 'post'], '/search', 'SearchController@index')->name('search');

Route::group([
    'namespace' => 'Ads',
], function(){
    Route::get('/ads/{id}', 'AdsController@getCard')->name('adsCard');
    Route::get('/category/{id}', 'CategoryController@getCard')->name('categoryCard');
    Route::get('/country/{id}', 'GeoController@getCountry')->name('country');
    Route::get('/region/{id}', 'GeoController@getRegion')->name('region');
    Route::get('/city/{id}', 'GeoController@getCity')->name('city');
    Route::get('/user/{id}', 'UserController@getCard')->name('userCard');
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
    Route::get('users/delete-new/{id}', 'UsersController@getDeleteNew')->where('id', '[0-9]+')->name('adminUsersDeleteNew');

    Route::get('categories', 'CategoriesController@getAll')->name('adminCategoriesAll');
    Route::match(['get', 'post'],'categories/create', 'CategoriesController@getCreate')->name('adminCategoryCreate');
    Route::match(['get', 'post'],'categories/update/{id}', 'CategoriesController@getUpdate')->where('id', '[0-9]+')->name('adminCategoryUpdate');
    Route::get('categories/delete/{id}', 'CategoriesController@getDelete')->where('id', '[0-9]+')->name('adminCategoryDelete');
    Route::get('categories/delete-new/{id}', 'CategoriesController@getDeleteNew')->where('id', '[0-9]+')->name('adminCategoryDeleteNew');

    Route::get('ads', 'AdsController@getAll')->name('adminAdsAll');
    Route::match(['get', 'post'],'ads/create', 'AdsController@getCreate')->name('adminAdsCreate');
    Route::match(['get', 'post'],'ads/update/{id}', 'AdsController@getUpdate')->where('id', '[0-9]+')->name('adminAdsUpdate');
    Route::get('ads/delete/{id}', 'AdsController@getDelete')->where('id', '[0-9]+')->name('adminAdsDelete');
    Route::get('ads/delete-new/{id}', 'AdsController@getDeleteNew')->where('id', '[0-9]+')->name('adminAdsDeleteNew');

    Route::get('pages', 'PagesController@getAll')->name('adminPages');
    Route::match(['get', 'post'],'page/create', 'PagesController@getCreate')->name('adminPageCreate');
    Route::match(['get', 'post'],'page/update/{id}', 'PagesController@getUpdate')->where('id', '[0-9]+')->name('adminPageUpdate');
    Route::get('page/delete/{id}', 'PagesController@getDelete')->where('id', '[0-9]+')->name('adminPageDelete');
    Route::get('page/delete-new/{id}', 'PagesController@getDeleteNew')->where('id', '[0-9]+')->name('adminPageDeleteNew');

    Route::get('restapp', 'ParsController@restApp')->name('adminParsRestApp');
    Route::match(['get', 'post'],'restapp-auto-avito-api', 'ParsController@restAppAutoAvitoApi')->name('adminParsRestAppAutoAvitoApi');
    Route::get('restapp-region', 'ParsController@restAppRegion')->name('adminParsRestAppRegion');
    Route::get('restapp-city', 'ParsController@restAppCity')->name('adminParsRestAppCity');
});


Route::get('/error/{code}', 'HomeController@pageError')->name('pageError');
Route::get('/{page?}', 'HomeController@page')->name('page');