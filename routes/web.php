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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/registerSuccess', function () {
    return view('registerSuccess');
});

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 


Route::post('/order', 'HomeController@order');


Route::get('/orderInfo', 'OrderInfoController@index');
Route::post('/confirm', 'OrderInfoController@order');
Route::post('/removeOrderItem/{orderId}', 'OrderInfoController@destroy');


Route::get('/orderHistory', 'OrderInfoController@orderHistory');

