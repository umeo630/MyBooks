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

    //積読登録
    function tsundokuStore(Request $request)
    {
        // sql実行
        // 成功時、resultにtrueが入る
        $tsundoku = new Tsundoku();
        $result = $tsundoku->insertTsundoku($request);

        if ($result) {
            //成功時
            return redirect()->route('tsundoku.register')->with('flash_message', '積読に登録しました');
        } else {
            // 失敗時処理
            var_dump('処理失敗');
        }
    }
}
