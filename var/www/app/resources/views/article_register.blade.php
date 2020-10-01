@extends('layouts.master')
@section('title', 'マイ記事管理')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message')}}
            </div>
            @endif

            <div class="article-head">
                <h3><i class="fa fa-angle-right"></i> マイ記事管理</h3>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 mt">
                <h4 class="title">簡単検索</h4>
                <form enctype="multipart/form-data" action="{{ route('register.index')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="show" class="form-control" placeholder="書籍名を入力してください。">
                    </div>
                    <button type="submit" class="btn btn-sm btn-theme">検索</button>
                </form>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt">
                <h4 class="title">マイ記事登録</h4>
                <form enctype="multipart/form-data" class="article-reegister-form" action="{{ route('article.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="mt-3">読んだ本：</label>
                        <input type="text" name="book_title" class="form-control" placeholder="読んだ本を記入してください。">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">読み終わった日：</label>
                        <input type="date" class="form-control" name="read_at">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">評価：</label>
                        <select class="form-control" name="book_evaluation">
                            <option selected>こちらから選択してください</option>
                            <option value="1">1:全くおすすめしない</option>
                            <option value="2">2:おすすめしない</option>
                            <option value="3">3:普通</option>
                            <option value="4">4:おすすめ</option>
                            <option value="5">5:かなりおすすめ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mt-3">サムネイル：</label>
                        <input type="file" class="form-control" name="photo" placeholder="画像をアップロードしてください。">
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
            <div class="col-lg-12 col-md-12 col-sm-12 mt">
                <div class="article-wrapper">
                    <h4 class="title">マイ記事一覧</h4>
                    @foreach ($articles as $article)
                    <div class="list-group col-lg-4 col-md-4 col-sm-4 text-center">
                        <div class="list-group-item flex-column align-items-start">
                            <div class="d-flex justify-content-between">
                                <div class="dropdown text-right">
                                    <button type="button" class="btn btn-link" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                        <a href="#!" class="dropdown-item text-primary" data-toggle="modal" data-target="#modal-edit-{{$article->id}}"> <i class="fa fa-edit"></i> 記事を更新する</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#!" class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{$article->id}}"> <i class="fa fa-trash-o"></i> 記事を削除する</a>
                                    </div>
                                </div>
                                <h5 class="mb-1">{{ $article->book_title}}</h5>
                                <p class="mb-1"><small>{{ $article->create_at->format('Y/m/d')}}</small></p><img src="{{$article->url ?? 'http://design-ec.com/d/e_others_50/l_e_others_501.png'}}" width="100" height="150">
                                <p class=" mb-1">{!! nl2br(e(Str::limit($article->book_content, 30, ' ...'))) !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$articles->links()}}
                </div>
            </div>
            <!--modalArticleEdit-->
            @foreach ($articles as $article)
            <body>
                <div class="modal fade" id="modal-edit-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="modalArticleEditLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content2">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="modalArticleEditLabel">マイ記事編集</h4>
                            </div>
                            <div class="modal-body">
                                <form class="article-reegister-form" role="form" action="{{ route ('article.update',['id' => $article->id])}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mt-3">読んだ本：</label>
                                        <input type="text" name="book_title" class="form-control" placeholder="読んだ本を記入してください。" value="{{ $article->book_title ?? old('book_title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3">読み終わった日：</label>
                                        <input type="date" class="form-control" name="read_at" value="{{ $article->read_at ?? old('read_at')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3">評価：</label>
                                        <select class="form-control" name="book_evaluation">
                                            <option selected> {{ $article->book_evaluation ?? old('book_evaluation')}}</option>
                                            <option value="1">1:全くおすすめしない</option>
                                            <option value="2">2:おすすめしない</option>
                                            <option value="3">3:普通</option>
                                            <option value="4">4:おすすめ</option>
                                            <option value="5">5:かなりおすすめ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3">サムネイル：</label>
                                        <input type="url" class="form-control" name="url" value="{{ asset($article->url)?? old( asset('url'))}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3">感想：</label>
                                        <textarea class="form-control" name="book_content" placeholder="感想を記入してください。" rows="5">{{ $article->book_content ?? old('book_content')}}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">保存</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-delete-{{$article->id}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modalArticleDeleteLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content2">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="modalArticleDeleteLabel">マイ記事削除</h4>
                            </div>
                            <form method="POST" action="{{ route('article.delete')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$article->id}}">
                                <div class="modal-body">
                                    {{ $article->book_title }}を削除します。よろしいですか？
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <a class="btn btn-default" data-dismiss="modal">キャンセル</a>
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </body>
            @endforeach
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->

@endsection
