@extends('layouts.master')
@section('title', 'みんなの記事詳細')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="chat-room mt">
            <aside class="right-side">
                <div class="room-desk2">
                    <img src="/img/framework/login-bg.jpg" alt="" width="100%" height="auto">
                    <div class="invite-row2">
                        <article-favorite :initial-is-favorited-by='@json($article->isFavoritedBy(Auth::user()))' :initial-count-favorites='@json($article->count_favorites)' :authorized='@json(Auth::check())' endpoint="{{ route('article.favorite', ['id' => $article->id]) }}"></article-favorite>
                    </div>
                </div>
            </aside>
            <aside class="mid-side">
                <div class="chat-room-head2">
                    <h2>{{$article->article_title}}</h2>
                    <h3><a href="#">{{$article->user->name}}</a></h3>
                </div>
                <div class="room-desk">
                    <h3>読んだ本：{{$article->book_title}}</h3>
                    <h4>作成日：{{$article->create_at}} <span>／</span>価格：¥2,500</h4>
                    <h3>★★★★★ 5</h3>
                    <div class="mt">
                        <h4>感想</h4>
                        <br>
                        <p>{{$article->book_content}}</p>
                    </div>
                </div>
            </aside>
        </div>


        <div class="chat-room">
            <aside class="right-side">
                <div class="invite-row3 text-center">
                    <h4>ユーザー名の他の記事</h4>
                </div>
                <ul class="chat-available-user">
                    <li>
                        <a href="chat_room.html">
                            <img width="50" height="75" src="img/framework/register-bg.jpg" width="32">
                            記事タイトル
                        </a>
                    </li>
                    <li>
                        <a href="chat_room.html">
                            <img width="50" height="75" src="img/framework/register-bg.jpg" width="32">
                            記事タイトル
                        </a>
                    </li>
                    <li>
                        <a href="chat_room.html">
                            <img width="50" height="75" src="img/framework/register-bg.jpg" width="32">
                            記事タイトル
                        </a>
                    </li>
                    <li>
                        <a href="chat_room.html">
                            <img width="50" height="75" src="img/framework/register-bg.jpg" width="32">
                            記事タイトル
                        </a>
                    </li>
                    <li>
                        <a href="chat_room.html">
                            <img width="50" height="75" src="img/framework/register-bg.jpg" width="32">
                            記事タイトル
                        </a>
                    </li>
                </ul>
            </aside>
            <aside class="mid-side">
                <div class="chat-room-head2 text-center">
                    <h4>コメント一覧</h4>
                </div>
                <div class="group-rom">
                    <div class="first-part odd">Sam Soffes</div>
                    <div class="second-part">Hi Mark, have a minute?</div>
                    <div class="third-part">12:30</div>
                </div>
                <div class="group-rom">
                    <div class="first-part">Mark Simmons</div>
                    <div class="second-part">Of course Sam, what you need?</div>
                    <div class="third-part">12:31</div>
                </div>
                <div class="group-rom">
                    <div class="first-part odd">Sam Soffes</div>
                    <div class="second-part">I want you examine the new product</div>
                    <div class="third-part">12:32</div>
                </div>
                <div class="group-rom">
                    <div class="first-part">Mark Simmons</div>
                    <div class="second-part">Ok, send me the pic</div>
                    <div class="third-part">12:32</div>
                </div>
                <div class="group-rom">
                    <div class="first-part odd">Sam Soffes</div>
                    <div class="second-part">
                        <a href="#">product.jpg</a> <span class="text-muted">35.4KB</span>
                        <p><img class="img-responsive" src="img/product.jpg" alt=""></p>
                    </div>
                    <div class="third-part">12:32</div>
                </div>
                <div class="group-rom">
                    <div class="first-part">Mark Simmons</div>
                    <div class="second-part">Fantastic job, love it :)</div>
                    <div class="third-part">12:32</div>
                </div>
                <div class="group-rom last-group">
                    <div class="first-part odd">Sam Soffes</div>
                    <div class="second-part">Thanks!!</div>
                    <div class="third-part">12:33</div>
                </div>
                <footer>
                    <div class="chat-txt">
                        <input type="text" class="form-control">
                    </div>
                    <button class="btn btn-theme">送信</button>
                </footer>
            </aside>
        </div>
    </section>
</section>
@endsection
