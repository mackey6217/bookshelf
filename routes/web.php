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

Route::get('post/create', 'PostsController@add');
Route::post('post/create', 'PostsController@create');
Route::get('post', 'PostsController@index');
Route::get('post/detail', 'PostsController@detail');
Route::get('post/delete', 'PostsController@delete');
