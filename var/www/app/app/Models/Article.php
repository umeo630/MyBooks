<?php

namespace App\Models;

use DB;
use App\User;
use App\Models\Comment;
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
        $book_evaluation = $request->book_evaluation;

        // 画像アッピロードに成功しているか確認
        if ($request->file('photo')->isValid()) {


            //ファイルを'記事id.jpg'としてpublicディレクトリに保存
            $article_count = (string) Article::count() + 1;

            $photo = $request->file('photo')->storeAs('public/article_image', $article_count . '.' . 'jpg');
            //ファイルのURLを生成
            $url = asset($photo);
        }

        // sql用のvalue
        $values = array($user_id, $article_title, $book_title, $book_content, $read_at, $book_evaluation, $url, 0, 0);

        // 実行sqlの作成
        $sql = 'INSERT INTO articles';
        $sql .= '          ( user_id, article_title, book_title, book_content, read_at, book_evaluation, url, display_flg, delete_flg, create_at )';
        $sql .= '   VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, now() )';

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
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        //お気に入りテーブルリレーション
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }


    //あるユーザーがいいね済かどうかを判定
    //引数がnullであっても許容
    public function isFavoritedBy(?User $user)
    {    //記事をいいねしたユーザーの中に引数として渡した＄userがいればtrueを返す

        return $user
            ? (bool) $this->favorites->where('id', $user->id)->count()
            : false;
    }

    //いいね数を算出
    public function getCountFavoritesAttribute()
    {
        return $this->favorites->count();
    }

    //コメントテーブルリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
