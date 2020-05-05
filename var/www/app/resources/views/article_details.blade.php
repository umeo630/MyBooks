@extends('layouts.master')
@section('title', 'みんなの記事詳細')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row mt">
            <div class="content-panel">
                <div class="panel-heading">
                    <h4><a href="#" class="user-name">ユーザー名</a></h4>
                </div>
                <div class="panel-body">
                    <div class="article-head">
                        <h3>記事タイトル</h3>
                    </div>
                    <div class="article-main">
                        <br>
                        <h5>読んだ本 <span> -- 2020/05/03</span></h5>
                        <hr>
                        <p>
                        "感想感想感想感想感想感想感想感想感想感想感想感想感想感想
                        <br>
                        感想感想感想感想感想感想感想感想感想感想感想感想感想感想感
                        <br>
                        想感想感想感想感想感想感想感想感想感想感想感想感想感想感想
                        <br>
                        感想感想感想感想感想感想感想感想感想感想感想感想感想感想感
                        <br>
                        想感想感想感想感想感想感想感想感想感想感想感想感想感想感想"
                    </p>
                    </div>
                    <div class="chat-room mt">
                        <div class="chat-room-head">
                            <h3>コメント欄</h3>
                        </div>
                        <div class="group-rom mt">
                            <div class="first-part odd"> <a href="#" class="user-name">ユーザー名</a></div>
                            <div class="second-part">コメントコメントココメントコメントコメントコメントコメント</div>
                            <div class="third-part">10:09</div>
                            <div class="first-part odd"> <a href="#" class="user-name">ユーザー名</a></div>
                            <div class="second-part">コメントコメントココメントコメントコメントコメントコメント</div>
                            <div class="third-part">10:09</div>
                            <div class="first-part odd"><a href="#" class="user-name">ユーザー名</a></div>
                            <div class="second-part">コメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメント</div>
                            <div class="third-part">10:09</div>
                        </div>
                        <a href="#">>コメントを全て見る</a>
                        <div class="chat-txt2 mt">
                            <textarea rows="3" class="form-control" placeholder="コメントを入力してください"></textarea>
                            <div class="grey-style">
                                <div class="pull-left">
                                    <button class="btn btn-md btn-theme"><i class="fa fa-star">いいね</i></button>
                                    <a>★3</a>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-md btn-theme03">送信</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    </>

                </div>



            </div>
    </section>
</section>
@endsection
