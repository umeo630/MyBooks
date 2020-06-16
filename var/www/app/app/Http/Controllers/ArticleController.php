<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\User;
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
    function articleDetails(Request $request, Article $article)
    {
        //取得したidでフィルタ
        $article = Article::find($request->id);

        //$articleのユーザーの記事を全て取得
        $user = User::where('id', $article->user_id)->first();

        $user_articles = $user->articles;

        //article_details表示、＄articleを渡す
        return view('article_details', ['article' => $article, 'user_articles' => $user_articles]);
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

    //マイ記事削除処理
    function articleDestroy(Request $request)
    {
        //削除する記事のインスタンスを呼び出し、削除
        Article::find($request->id)->delete();

        return redirect()->route('article.register');
    }


    //お気に入り処理
    function articleFavorite(Request $request, Article $article)
    {
        //削除処理を始めに行い、二重お気に入りを防止
        $article = Article::find($request->id);

        $article->favorites()->detach($request->user()->id);
        $article->favorites()->attach($request->user()->id);



        return [
            'id' => $article->id,
            'countFavorites' => $article->count_favorites,
        ];
    }

    //お気に入り解除処理
    function articleUnfavorite(Request $request, Article $article)
    {
        //削除処理を始めに行い、二重お気に入りを防止
        $article = Article::find($request->id);


        $article->favorites()->detach($request->user()->id);


        return [
            'id' => $article->id,
            'countFavorites' => $article->count_favorites,
        ];
    }
}
