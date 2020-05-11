<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // みんなの記事一覧画面
    function articleList()
    {
        $articles = Article::all()->sortByDesc('created_at');

        return view('article_list', ['articles' => $articles]);
    }
    //みんなの記事詳細
    function articleDetails()
    {
        return view('article_details');
    }

    //マイ記事管理画面
    function articleRegister()
    {
        return view('article_register');
    }

    //マイ記事登録処理
    function articleStore(ArticleRequest $request, Article $article)
    {
        $article->title = $request->title;
        $article->body = $request->body;
        $article->book_title = $request->book_title;
        $article->date = $request->date;
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('article.list');
    }
}
