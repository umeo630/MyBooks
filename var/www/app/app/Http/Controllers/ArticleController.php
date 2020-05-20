<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    function articleDetails($id, Article $article)
    {
        //取得したidでフィルタ
        $article = DB::table('articles')->find($id);

        //article_details表示、＄articleを渡す
        return view('article_details', ['article' => $article]);
    }

    //マイ記事管理画面
    function articleRegister()
    {
        //ログインしているユーザーのidを取得
        $user_id = Auth::id();
        //ログインしているユーザーの記事を表示(articlesテーブルのuser_idと一致した記事を表示)
        $articles = DB::table('articles')->where('user_id', $user_id)->get();

        return view('article_register', ['articles' => $articles, 'user_id' => $user_id]);
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
    //マイ記事編集処理
    function articleUpdate(ArticleRequest $request)
    {
        //編集する記事のインスタンスを呼び出す
        $article = Article::find($request->id);

        //入力されたデータを取り出して保存
        $form = $request->all();

        unset($form['_token']);

        $article->fill($form)->save();

        return redirect()->route('article.register');
    }
}
