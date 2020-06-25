<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //コメント登録
    public function commentStore(Request $request)
    {
        //sql実行
        $comment = new Comment();
        $result = $comment->insertComment($request);

        if ($result) {
            //成功処理
            return redirect()->route('article.details', ['id' => $request->article_id]);
        } else {
            //失敗処理
            var_dump('処理失敗');
        }
    }

    //コメント削除
    public function commentDestroy(Request $request)
    {
        Comment::find($request->id)->delete();

        return redirect()->route('article.details', ['id' => $request->article_id]);
    }
}
