<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    //編集可能にする
    protected $fillable = [
        'article_title',
        'book_title',
        'book_content',
        'read_at',
    ];

    // 記事登録
    // 登録成功した場合、trueを返す
    public function insertArticle($request)
    {

        // validation済みの値を取得する
        // TODO:book_evaluationの値入力させる
        $user_id = $request->user()->id;
        $article_title = $request->article_title;
        $book_title = $request->book_title;
        $book_content = $request->book_content;
        $read_at = $request->read_at;

        // sql用のvalue
        $values = array($user_id, $article_title, $book_title, $book_content, $read_at, 0, 0);

        // 実行sqlの作成
        $sql = 'INSERT INTO articles';
        $sql .= '          ( user_id, article_title, book_title, book_content, read_at, display_flg, delete_flg, create_at )';
        $sql .= '   VALUES ( ?, ?, ?, ?, ?, ?, ?, now() )';

        // insert文の実行
        $result = DB::insert($sql, $values);

        // 1件登録成功時、
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function user()
    {
        //記事を投稿したユーザー情報を取得
        return $this->belongsTo('App\User');
    }
}
