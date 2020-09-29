<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
use Storage;

class Tsundoku extends Model
{

    protected $table = 'tsundokus';


    //編集可能にする
    protected $fillable = [
        'title',
        'content',
        'scheduled_date',
        'price',
    ];

    //formatを使えるようにする
    protected $dates = [
        'created_at',
        'scheduled_date'
    ];

    public function user()
    {
        //積読したユーザー情報を取得
        return $this->belongsTo(User::class);
    }

    // 記事登録
    // 登録成功した場合、trueを返す
    public function insertTsundoku($request)
    {

        //値を取得する
        $user_id = $request->user()->id;
        $title = $request->title;
        $content = $request->content;
        $scheduled_date = $request->scheduled_date;
        $price = $request->price;
        $url = $request->url;

        // 画像アッピロードに成功しているか確認
        if ($request->file('photo')) {

            //s3アップロード開始
            $photo = $request->file('photo');

            //バケットの’article_image’フォルダへアップロード
            $path = Storage::disk('s3')->putfile('tsundoku_image', $photo, 'public');

            //画像のフルパスを取得
            $url = Storage::disk('s3')->url($path);
        };


        // sql用のvalue
        $values = array($user_id, $title, $content, $scheduled_date, $price, $url);

        // 実行sqlの作成
        $sql = 'INSERT INTO tsundokus';
        $sql .= '          ( user_id, title, content, scheduled_date, price, url, created_at )';
        $sql .= '   VALUES ( ?, ?, ?, ?, ?, ?, now() )';

        // insert文の実行
        $result = DB::insert($sql, $values);

        // 1件登録成功時、
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }
}
