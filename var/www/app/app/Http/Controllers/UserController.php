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
