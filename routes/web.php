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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('post/create', 'Admin\PostController@add');
    Route::post('post/create', 'Admin\PostController@create'); //追記
    Route::get('post', 'Admin\PostController@index');
    Route::get('post/edit/{id}', 'Admin\PostController@edit'); // 追記
    Route::post('post/edit', 'Admin\PostController@update'); // 追記
    Route::get('post/delete/{id}', 'Admin\PostController@delete');
});
