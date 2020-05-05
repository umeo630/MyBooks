<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // みんなの記事一覧画面
    function articleList()
    {
        return view('article_list');
    }
    //みんなの記事詳細
    function articleDetails()
    {
        return view('article_details');
    }

    //マイ記事登録画面
    function articleRegister()
    {
        return view('article_register');
    }
}
