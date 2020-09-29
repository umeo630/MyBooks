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
        //ログインしているユーザーの積読を表示(articlesテーブルのuser_idと一致した積読を表示)
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

    //簡単登録検索一覧
    function index(Request $request)
    {
        unset($request['_token']);
        $value = $request['show'];

        $base_url = 'https://www.googleapis.com/books/v1/volumes?q=';

        $response = file_get_contents($base_url . $value);

        $result = json_decode($response, true);

        $items = $result["items"];

        return view('tsundoku_api_index', ['items' => $items]);
    }

    //積読編集
    function tsundokuUpdate(Request $request)
    {
        //編集する積読のインスタンスを呼び出す
        $tsundoku = Tsundoku::find($request->id);

        //入力されたデータを取り出して保存
        $form = $request->all();

        unset($form['_token']);

        $tsundoku->fill($form)->save();

        return redirect()->route('tsundoku.register')->with('flash_message', '積読を編集しました');
    }



    //積読削除
    function tsundokuDestroy(Request $request)
    {
        //削除する積読のインスタンスを呼び出し、削除
        $tsundoku = Tsundoku::find($request->id);
        $tsundoku->delete();

        return redirect()->route('tsundoku.register')->with('flash_message', '積読を削除しました');
    }
}
