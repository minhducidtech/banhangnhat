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

Route::get('del-cart/{id}',[
	'as'=>'del-cart',
	'uses'=>'PageController@getDellItemCart'
]);

Route::get('get-dat-hang',[
	'as'=>'get-dat-hang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('post-dat-hang',[
	'as'=>'post-dat-hang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('get-login',[
	'as'=>'get-login',
	'uses'=>'PageController@getLogin'
]);

Route::post('post-login',[
	'as'=>'post-login',
	'uses'=>'PageController@postLogin'
]);

Route::get('get-signup',[
	'as'=>'get-signup',
	'uses'=>'PageController@getSignup'
]);

Route::post('post-signup',[
	'as'=>'post-signup',
	'uses'=>'PageController@postSignup'
]);

Route::get('get-logout',[
	'as'=>'get-logout',
	'uses'=>'PageController@getLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
