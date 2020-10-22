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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'Profile\ProfileController@index')->name('profile');
Route::get('/profile/edit', 'Profile\ProfileController@edit')->name('profileEdit');
Route::get('/profile/myads', 'Profile\ProfileController@myAds')->name('profileMyAds');


Route::get('/ads/add', 'ADS\AdsController@getAdd')->name('adsFormAdd');
Route::get('/ads/{id}', 'ADS\AdsController@getCard')->name('adsCard');
