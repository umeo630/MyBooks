<?php

namespace Tests\Feature;

use App\Models\Article;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    //RefreshDatabaseトレイトでデータベースをリセット
    use RefreshDatabase;

    public function testIsFavoritedByNull()
    {
        //テストに必要なArtocleモデルを生成し代入
        $article = factory(Article::class)->create();

        //引数としてnullを渡し、その戻り値が$resultに代入される
        $result = $article->isFavoritedBy(null);

        //引数がfalseかどうかをテスト
        $this->assertFalse($result);
    }

    public function testIsFavoritedByTheUser()
    {
        //テストに必要なモデルを生成し代入
        $article = factory(Article::class)->create();
        $user = factory(User::class)->create();

        //ファクトリで生成された$userが$articleにいいねをする
        $article->favorites()->attach($user);

        //$articleに$userからいいねされていればtrueが返る
        $result = $article->isFavoritedBy($user);

        //$resultがtrueかどうかテストする
        $this->assertTrue($result);
    }

    public function testIsFavoritedByAnother()
    {
        //テストに必要なモデルを生成し代入
        $article = factory(Article::class)->create();
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();

        //$anotherに代入されたUserモデルのインスタンスが$articleをいいね
        $article->favorites()->attach($another);

        //＄userはいいねをしていないからfalseが入る
        $result = $article->isFavoritedBy($user);

        //$resultがfalseかどうかをテスト
        $this->assertFalse($result);
    }
}
