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

        return view('user_show', ['user' => $user]);
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
