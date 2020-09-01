<?php

namespace App\Models;

use DB;
use Storage;
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
        'book_price',
        'book_evaluation',
    ];

    //formatを使えるようにする
    protected $dates = [
        'create_at'
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
        $book_price = $request->book_price;
        $book_evaluation = $request->book_evaluation;
        $url = $request->url;

        // 画像アッピロードに成功しているか確認
        if ($request->file('photo')) {

            //s3アップロード開始
            $photo = $request->file('photo');

            //バケットの’article_image’フォルダへアップロード
            $path = Storage::disk('s3')->putfile('article_image', $photo, 'public');

            //画像のフルパスを取得
            $url = Storage::disk('s3')->url($path);
        };


        // sql用のvalue
        $values = array($user_id, $article_title, $book_title, $book_content, $read_at, $book_price, $book_evaluation, $url, 0, 0);

        // 実行sqlの作成
        $sql = 'INSERT INTO articles';
        $sql .= '          ( user_id, article_title, book_title, book_content, read_at, book_price, book_evaluation, url, display_flg, delete_flg, create_at )';
        $sql .= '   VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now() )';

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
        //ArticleモデルとUserモデルをlikesテーブルを通じて多対多で結び付ける
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }


    //あるユーザーがいいね済かどうかを判定
    //引数がnullであっても許容
    public function isFavoritedBy(?User $user)
    {
        //戻り値はtrueかfalseとなる
        //記事をいいねしたユーザーの中に引数として渡した＄userがいればtrueを返す
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
