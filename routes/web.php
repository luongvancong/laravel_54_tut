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

Route::group(['prefix' => '/admin', 'middleware' => ['check_login', 'check_admin']], function() {
    Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);

    // Products
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', ['as' => 'admin.product.index', 'uses' => 'Admin\ProductController@getIndex']);

        Route::get('/create', ['as' => 'admin.product.create', 'uses' => 'Admin\ProductController@getCreate']);
        Route::post('/create', 'Admin\ProductController@postCreate');

        Route::get('/{id}/edit', ['as' => 'admin.product.edit', 'uses' => 'Admin\ProductController@getEdit']);
        Route::post('/{id}/edit', 'Admin\ProductController@postEdit');

        Route::get('/{id}/delete', ['as' => 'admin.product.delete', 'uses' => 'Admin\ProductController@getDelete']);

        Route::get('/{id}/active', ['as' => 'admin.product.active', 'uses' => 'Admin\ProductController@getActive']);

        Route::get('/{id}/hot', ['as' => 'admin.product.hot', 'uses' => 'Admin\ProductController@getHot']);
    });

    // Categories
    Route::group(['prefix' => 'category'], function() {
        Route::get('/', ['as' => 'admin.category.index', 'uses' => 'Admin\CategoryController@getIndex']);

        Route::get('/create', ['as' => 'admin.category.create', 'uses' => 'Admin\CategoryController@getCreate']);
        Route::post('/create', 'Admin\CategoryController@postCreate');

        Route::get('/{id}/edit', ['as' => 'admin.category.edit', 'uses' => 'Admin\CategoryController@getEdit']);
        Route::post('/{id}/edit', 'Admin\CategoryController@postEdit');

        Route::get('/{id}/delete', ['as' => 'admin.category.delete', 'uses' => 'Admin\CategoryController@getDelete']);

        Route::get('/{id}/active', ['as' => 'admin.category.active', 'uses' => 'Admin\CategoryController@getActive']);
    });

    // Settings
    Route::group(['prefix' => 'setting'], function() {
        Route::get('/', ['as' => 'admin.setting.index', 'uses' => 'Admin\SettingController@getSetting']);
        Route::post('/', 'Admin\SettingController@postSetting');
    });

});


Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@index']);

Route::get('/tin-tuc', ['as' => 'tin_tuc', 'uses' => 'TinTucController@getIndex']);
Route::get('/chi-tiet-tin-tuc', ['as' => 'chi_tiet_tin_tuc', 'uses' => 'TinTucController@getChiTiet']);

Route::get('/them-tin', ['as' => 'them_tin', 'uses' => 'TinTucController@getCreate']);
Route::post('/them-tin', 'TinTucController@postCreate');

// Gio hang
Route::group(['prefix' => 'gio-hang'], function() {
    Route::get('/', ['as' => 'cart.listing', 'uses' => 'CartController@getListing']);
    Route::get('add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@addProduct']);
    Route::get('remove/{id}', ['as' => 'cart.remove', 'uses' => 'CartController@removeProduct']);
});

Auth::routes();
