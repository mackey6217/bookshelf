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

Route::get('/', 'PostsController@index');
    

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('post/create', 'PostsController@add');
    Route::post('post/create', 'PostsController@create');
    Route::get('post/delete', 'PostsController@delete');
    Route::get('post/edit', 'PostsController@edit');
    Route::post('post/edit', 'PostsController@update');
});

Route::get('post/detail', 'PostsController@detail');



Auth::routes();
