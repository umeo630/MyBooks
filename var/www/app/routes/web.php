<?php

use Illuminate\Support\Facades\Route;

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

// 記事一覧画面
Route::get('/', 'ArticleController@articleList')->name('article.list');
//マイ記事登録
Route::get('/article/register', 'ArticleController@articleRegister')->name('article.register')->middleware('auth');
//記事詳細画面
Route::get('/article/{id}', 'ArticleController@articleDetails')->name('article.details');
//記事登録処理
Route::post('/article', 'ArticleController@articleStore')->name('article.store');
//記事更新処理
Route::post('/article/update/{id}', 'ArticleController@articleUpdate')->name('article.update');
//記事削除処理
Route::post('/article/delete', 'ArticleController@articleDestroy')->name('article.delete');


//ユーザーページ
Route::get('/user', 'UserController@userPage');

Auth::routes();
