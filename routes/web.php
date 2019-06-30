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

//Authenticationのためのルート設定
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//新規スケジュール作成のためのルート設定
Route::get('/new', 'BooksController@create');
Route::post('post', 'BooksController@store');

//スケジュール削除のルーティング
Route::delete('/posts/{id}', 'BooksController@destroy');

//スケジュールの詳細画面表示のルーティング
Route::get('/{id}', 'BooksController@show');

//スケジュールの編集のルーティング
Route::get('/{id}/edit', 'BooksController@edit');
Route::patch('/{id}', 'BooksController@update');
