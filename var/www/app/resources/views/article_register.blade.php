@extends('layouts.master')
@section('title', 'マイ記事管理')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="article-head">
                <h3><i class="fa fa-angle-right"></i> マイ記事管理</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 mt">
                <h4 class="title">マイ記事登録</h4>
                <form class="article-reegister-form" role="form" action="{{ route('article.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="mt-3">記事タイトル：</label>
                        <input type="text" name="article_title" class="form-control" placeholder="記事タイトルを記入してください。">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">読んだ本：</label>
                        <input type="text" name="book_title" class="form-control" placeholder="読んだ本を記入してください。">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">読み終わった日：</label>
                        <input type="date" class="form-control" name="read_at">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">本文：</label>
                        <textarea class="form-control" name="book_content" placeholder="感想を記入してください。" rows="5"></textarea>
                    </div>
                    <div class="form-send">
                        <button type="submit" class="btn btn-large btn-theme">登録</button>
                    </div>
                </form>
            </div>
            <!-- マイ記事一覧 -->
            <div class="col-lg-6 col-md-6 col-sm-6 mt">
                <h4 class="title">マイ記事一覧</h4>
                @foreach ($articles as $article)
                <div class="list-group">
                    <a class="list-group-item flex-column align-items-start" data-toggle="modal" data-target="#modal-edit-{{$article->id}}">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">{{ $article->article_title}}</h5>
                            <p class="mb-1"><small>{{ $article->create_at}}</small></p>
                        </div>
                        <p class=" mb-1">{{ $article->book_title}}</p>
                        <small>{{ $article->book_content}}</small>
                    </a>
                </div>
                @endforeach
            </div>

            <!--modalArticleEdit-->
            @foreach ($articles as $article)
            <div class="modal" id="modal-edit-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="modalArticleEditLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalArticleEditLabel">マイ記事編集</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="article-reegister-form" role="form" action="{{ route ('article.update',['id' => $article->id])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="mt-3">記事タイトル：</label>
                                    <input type="text" name="article_title" class="form-control" value="{{ $article->article_title ?? old('article_title')}}">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3">読んだ本：</label>
                                    <input type="text" name="book_title" class="form-control" placeholder="読んだ本を記入してください。" value="{{ $article->book_title ?? old('book_title')}}">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3">読み終わった日：</label>
                                    <input type="date" class="form-control" name="read_at" value="{{ $article->read_at ?? old('read_at')}}">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3">感想：</label>
                                    <textarea class="form-control" name="book_content" placeholder="感想を記入してください。" rows="5">{{ $article->book_content ?? old('book_content')}}</textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">削除</button>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->

@endsection
