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
Route::get('/', 'ArticleController@articleList');
//マイ記事登録
Route::get('/article/register', 'ArticleController@articleRegister')->name('article.register');
//ユーザーログイン
Route::get('user/login', 'UserController@userLogin');
//新規会員登録
Route::get('user/register', 'UserController@userRegister');
//記事詳細画面
Route::get('/article/details', 'ArticleController@articleDetails');


Route::get('/user', 'UserController@userPage');

Auth::routes();
