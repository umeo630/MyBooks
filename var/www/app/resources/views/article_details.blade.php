@extends('layouts.master')
@section('title', 'みんなの記事詳細')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="pull-left">
            <h4><a href="#">≪前の記事</a></h4>
        </div>
        <div class="pull-right">
            <h4><a href="#">≫次の記事</a></h4>
        </div>
        <div class="row mt">
            <div class="content-panel">
                <div class="article-head">
                    <h3><a href="#" class="user-name">ユーザー名</a><span>/</span>{{ $article->article_title}}</h3>
                    <div class="pull-right">
                        <button class="btn btn-md btn-theme02"><i class="fa fa-star">いいね</i></button>
                    </div>
                </div>
                <br>
                <div class="article-main">
                    <h5>{{ $article->book_title}} <span> -- {{$article->create_at}}</span></h5>
                    <hr>
                    <p>
                        {{ $article->book_content}}
                    </p>
                </div>
                <div class="chat-room mt">
                    <div class="group-rom mt">
                        <div class="first-part text-center"> <a href="#">ユーザー名</a></div>
                        <div class="second-part">コメントコメントココメントコメントコメントコメントコメント</div>
                        <div class="third-part02">10:09</div>
                        <div class="first-part text-center"> <a href="#">ユーザー名</a></div>
                        <div class="second-part">コメントコメントココメントコメントコメントコメントコメント</div>
                        <div class="third-part02">10:09</div>
                        <div class="first-part text-center"><a href="#">ユーザー名</a></div>
                        <div class="second-part">コメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメント</div>
                        <div class="third-part02">10:09</div>
                    </div>
                    <a href="#" class="pull-right">>コメントを全て見る</a>
                    <div class="chat-txt2 mt">
                        <textarea rows="3" class="form-control" placeholder="コメントを入力してください"></textarea>
                        <div class="grey-style">
                            <div class="pull-right">
                                <button class="btn btn-md btn-theme03">送信</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>



        </div>
    </section>
</section>
@endsection
