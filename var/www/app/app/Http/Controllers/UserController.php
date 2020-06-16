<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー情報画面
    function userPage(string $name)
    {
        //ユーザーの名前を取得
        $user = User::where('name', $name)->first();

        //ユーザーの記事一覧を取得し、作成日順に並べる
        $articles = $user->articles->sortByDesc('create_at');

        //ユーザーがお気に入りした記事を取得し、お気に入りした順に並べる
        $articles_favorites = $user->favorites->sortByDesc('creted_at');

        //フォロワーを取得し、フォローされた順に並べる
        $followers = $user->followers->sortByDesc('created_at');

        //フォローしているユーザーを取得し、フォローした順に並べる
        $followings = $user->followings->sortByDesc('created_at');

        return view('user_show', ['user' => $user, 'articles' => $articles, 'articles_favorites' => $articles_favorites, 'followings' => $followings, 'followers' => $followers]);
    }

    function userFollow(Request $request, string $name)
    {
        //フォローされる側のユーザー名を取得
        $user = User::where('name', $name)->first();

        //フォローする側とされる側のIDが同じだったらエラーを表示
        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow youeself.');
        }
        //リクエストを行なったユーザーモデルを返し、フォローテーブルに追加
        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    function userUnfollow(Request $request, string $name)
    {
        //フォローされる側のユーザー名を取得
        $user = User::where('name', $name)->first();

        //フォローする側とされる側のIDが同じだったらエラーを表示
        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow youeself.');
        }
        //リクエストを行なったユーザーモデルを返し、フォローテーブルに追加
        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

    //ログイン
    function userLogin()
    {
        return view('login');
    }

    //新規会員登録
    function userRegister()
    {
        return view('register');
    }
}
