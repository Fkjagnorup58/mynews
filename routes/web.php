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

// (3)
Route::get('/XXX', 'Admin\AAAController@bbb');

// (4)
Route::group(['prefix' => 'admin'], function() {
    Route::get('profile/add', 'Admin\ProfileController@add');//グループを使用する書き方
    Route::get('profile/create', 'Admin\ProfileController@add');//グループを使用する書き方
    Route::get('profile/edit', 'Admin\ProfileController@edit');//グループを使用する書き方
    Route::get('profile/update', 'Admin\ProfileController@update');//グループを使用する書き方
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin|NewsController@add');//グループを使用する書き方
    Route::get('profile/create', 'AdminProfileController@add');
    Route::get('profile/edit', 'AdminProfileController@add');
});//Route::get('admin'/news/create', 'Adimin|NewsController@add');

//Route::group('prefix' =>　'admin'],function()　{
 /*Route::get('news/create', 'Admin\NewsController@add');
     Route::get('news/delete', 'Admin\NewsController@delete');
     Route::get('news/update', 'Admin\NewsController@update');
});*/

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::post('profile/create', 'Admin\ProfileController@create')->middleware('auth');
    Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'NewsController@index');
