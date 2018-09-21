<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
	'as'=>'trangchu',
	'uses'=>'PageController@getIndex'

]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loai-san-pham',
	'uses'=>'PageController@getLoaisanpham'

]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chi-tiet-san-pham',
	'uses'=>'PageController@getChitietsanpham'

]);

Route::get('lien-he',[
	'as'=>'lien-he',
	'uses'=>'PageController@getLienhe'

]);

Route::get('gioi-thieu',[
	'as'=>'gioi-thieu',
	'uses'=>'PageController@getGioithieu'

]);

Route::get('add-to-cart/{id}',[
	'as'=>'add-to-cart',
	'uses'=>'PageController@getAddtoCart'
]);
