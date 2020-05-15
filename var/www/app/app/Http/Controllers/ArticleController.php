<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

    // みんなの記事一覧画面
    function articleList()
    {
        // 記事情報を全て取得
        // TODO:削除フラグの立っているものは取得してこない。
        // TODO:非表示フラグの立っているものは取得してこない。→途中で保存などの記事は自分だけ表示？
        $articles = Article::all()->sortByDesc('created_at');

        return view('article_list', ['articles' => $articles]);
    }

    //みんなの記事詳細
    function articleDetails(Request $request, $id, Article $article)
    {
        //取得したidでフィルタ
        $article = Article::find($id);

        //article_details表示、＄articleを渡す
        return view('article_details', ['article' => $article]);
    }

    //マイ記事管理画面
    function articleRegister()
    {
        return view('article_register');
    }

    //マイ記事登録処理
    function articleStore(ArticleRequest $request)
    {
        // sql実行
        // 成功時、resultにtrueが入る
        $article = new Article();
        $result = $article->insertArticle($request);

        if ($result) {
            // 成功時処理
            return redirect()->route('article.list');
        } else {
            // 失敗時処理
            var_dump('処理失敗');
        }
    }

}
