@extends('layouts.master')
@section('title', 'みんなの記事一覧')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="chat-room mt">
            <aside class="mid-side">
                <div class="chat-room-head">
                    <h3>コメント欄</h3>
                </div>
                <div class="group-rom">
                    <div class="first-part odd">テスト太郎</div>
                    <div class="second-part">コメントコメントココメントコメントコメントコメントコメント</div>
                    <div class="third-part">10:09</div>
                </div>
                <div class="group-rom last-group">
                    <div class="first-part odd">テスト太郎</div>
                    <div class="second-part">コメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメント</div>
                    <div class="third-part">10:09</div>
                </div>
                <footer>
                    <div class="chat-txt">
                        <input type="text" class="form-control" placeholder="コメントを入力してください">
                    </div>
                    <button class="btn btn-theme">送信</button>
                </footer>
            </aside>
        </div>
    </section>
</section>
@endsection
