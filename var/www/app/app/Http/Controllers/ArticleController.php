<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // みんなの記事一覧画面
    function articleList(){
        return view('article_list');
    }
}
