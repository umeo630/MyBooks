<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー情報画面
    function userPage(){
        return view('user');
    }
}
