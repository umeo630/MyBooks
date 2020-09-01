<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    //RefreshDatabaseトレイトでデータベースをリセット
    use RefreshDatabase;

    public function testList()
    {
        //$thisはArticleControllerTestクラス
        $response = $this->get(route('article.list'));

        //$responseのステータスコードが200であればテスト合格
        //article_listのビューファイルを表示しているかどうか
        $response->assertStatus(200)
            ->assertViewIs('article_list');
    }

    public function testGuestStore()
    {
        //未ログイン状態の記事投稿画面テスト
        $response = $this->get(route('article.register'));

        //ログイン画面にリダイレクトされるか
        $response->assertRedirect(route('login'));
    }

    public function testAuthStore()
    {
        //テストに必要なモデルを生成
        $user = factory(User::class)->create();

        //ログインした状態のユーザーモデルでアクセス
        $response = $this->actingAs($user)
            ->get(route('article.register'));

        $response->assertStatus(200)
            ->assertViewIs('article_register');
    }
}
