<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\User;

class Comment extends Model
{
    protected $table = 'article_comments';

    protected $fillable = [
        'comment',
    ];

    //記事テーブルとリレーション
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    //ユーザーテーブルとリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'commenter_id');
    }

    public function insertComment($request)
    {
        //バリデーション済の値を取得
        $article_id = $request->article_id;
        $commenter_id = $request->user_id;
        $comment = $request->comment;

        //sql用のvalue
        $values = array($article_id, $commenter_id, $comment, 0, 0);

        //実行sql
        $sql = 'INSERT INTO article_comments';
        $sql .= '           ( article_id, commenter_id, comment, reply_flg, reply_to, created_at)';
        $sql .= '      VALUES ( ?, ?, ?, 0, 0, now() )';

        //insert文の実行
        $result = DB::insert($sql, $values);

        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }
}
