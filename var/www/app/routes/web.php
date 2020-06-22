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
//お気に入り処理
Route::put('/article/{id}/favorite', 'ArticleController@articleFavorite')->name('article.favorite')->middleware('auth');
//お気に入り解除処理
Route::delete('/article/{id}/favorite', 'ArticleController@articleUnFavorite')->name('article.unfavorite')->middleware('auth');

//ユーザーページ
Route::get('/user/{name}', 'UserController@userPage')->name('user.show');
//フォロー処理
Route::put('/user/{name}/follow', 'UserController@userFollow')->name('user.follow')->middleware('auth');
//フォロー解除処理
Route::delete('/user/{name}/follow', 'UserController@userUnfollow')->name('user.follow')->middleware('auth');
//ユーザー情報ページ
Route::get('/user/{name}/info', 'UserController@userInfo')->name('user.info')->middleware('auth');
//ユーザー名編集ページ
Route::get('/user/{name}/edit', 'UserController@userEdit')->name('user.edit')->middleware('auth');
//ユーザー名更新処理
Route::post('/user/{name}/update', 'UserController@userUpdate')->name('user.update');
//メールアドレス変更ページ
Route::get('/user/{name}/email', 'UserController@userEmailEdit')->name('email.edit')->middleware('auth');



Auth::routes();
