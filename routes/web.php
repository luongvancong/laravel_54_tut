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

Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@index']);

Route::get('/tin-tuc', ['as' => 'tin_tuc', 'uses' => 'TinTucController@getIndex']);
Route::get('/chi-tiet-tin-tuc', ['as' => 'chi_tiet_tin_tuc', 'uses' => 'TinTucController@getChiTiet']);

Route::get('/them-tin', ['as' => 'them_tin', 'uses' => 'TinTucController@getCreate']);
Route::post('/them-tin', 'TinTucController@postCreate');

Auth::routes();
