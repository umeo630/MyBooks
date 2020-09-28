<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tsundoku;
use Illuminate\Support\Facades\Auth;

class TsundokuController extends Controller
{
    //積読リスト表示
    function tsundokuList()
    {
        //ログインユーザーの積読リストを表示
    }

    //積読管理ページ表示
    function tsundokuRegister()
    {
        //ログインしているユーザーのidを取得
        $user_id = Auth::id();
        //ログインしているユーザーの記事を表示(articlesテーブルのuser_idと一致した記事を表示)
        $tsundokus = Tsundoku::where('user_id', $user_id)
            ->latest('created_at')
            ->paginate(6);

        return view('tsundoku_register', ["tsundokus" => $tsundokus, "user_id" => $user_id]);
    }
}
