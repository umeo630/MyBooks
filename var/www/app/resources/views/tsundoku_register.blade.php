@extends('layouts.master')
@section('title', '積読管理')

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
                <h3><i class="fa fa-angle-right"></i> 積読管理</h3>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 mt">
                <h4 class="title">簡単検索</h4>
                <form enctype="multipart/form-data" action="{{ route('tsundoku_register.index')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="show" class="form-control" placeholder="本のタイトルを入力してください。">
                    </div>
                    <button type="submit" class="btn btn-sm btn-theme">検索</button>
                </form>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt">
                <h4 class="title">積読登録</h4>
                <form enctype="multipart/form-data" class="article-reegister-form" action="{{ route('tsundoku.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="mt-3">本のタイトル：</label>
                        <input type="text" name="title" class="form-control" placeholder="本のタイトルを入力してください。">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">読了予定日：</label>
                        <input type="date" class="form-control" name="scheduled_date">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">金額：</label>
                        <input type="number" class="form-control" name="price" placeholder="金額を入力してください。">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">サムネイル：</label>
                        <input type="file" class="form-control" name="photo" placeholder="画像をアップロードしてください。">
                    </div>
                    <div class="form-group">
                        <label class="mt-3">メモ：</label>
                        <textarea class="form-control" name="content" placeholder="メモを記入してください。" rows="5"></textarea>
                    </div>
                    <div class="form-send">
                        <button type="submit" class="btn btn-large btn-theme">登録</button>
                    </div>
                </form>
            </div>
            <!-- 積読一覧-->
            <div class="col-lg-12 col-md-12 col-sm-12 mt">
                <div class="article-wrapper">
                    <h4 class="title">積読一覧</h4>
                    @foreach ($tsundokus as $tsundoku)
                    <div class="list-group col-lg-4 col-md-4 col-sm-4 text-center">
                        <div class="list-group-item flex-column align-items-start">
                            <div class="d-flex justify-content-between">
                                <div class="dropdown text-right">
                                    <button type="button" class="btn btn-link" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                        <a href="#!" class="dropdown-item text-primary" data-toggle="modal" data-target="#modal-edit-{{$tsundoku->id}}"> <i class="fa fa-edit"></i> 更新する</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#!" class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{$tsundoku->id}}"> <i class="fa fa-trash-o"></i> 削除する</a>
                                    </div>
                                </div>
                                <h5 class="mb-1">{{ $tsundoku->title}}</h5>
                                <p class="mb-1"><small>{{ $tsundoku->created_at->format('Y/m/d')}}</small></p><img src="{{$tsundoku->url ?? 'http://design-ec.com/d/e_others_50/l_e_others_501.png'}}" width="100" height="150">
                                <p class=" mb-1">{!! nl2br(e(Str::limit($tsundoku->content, 30, ' ...'))) !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$tsundokus->links()}}
                </div>
            </div>

            <!--modalArticleEdit-->
            @foreach ($tsundokus as $tsundoku)
            <body>
                <div class="modal fade" id="modal-edit-{{$tsundoku->id}}" tabindex="-1" role="dialog" aria-labelledby="modalArticleEditLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content2">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="modalArticleEditLabel">積読編集</h4>
                            </div>
                            <div class="modal-body">
                                <form class="article-reegister-form" role="form" action="{{ route ('tsundoku.update',['id' => $tsundoku->id])}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mt-3">本のタイトル：</label>
                                        <input type="text" name="title" class="form-control" placeholder="本のタイトルを入力してください。" value="{{ $tsundoku->title ?? old('title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3">読了予定日：</label>
                                        <input type="date" class="form-control" name="scheduled_date" value="{{ $tsundoku->scheduled_date ?? old('scheduled_date')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3">金額：</label>
                                        <input type="number" class="form-control" name="price" placeholder="金額を入力してください。" value="{{ $tsundoku->price ?? old('price')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3">サムネイル：</label>
                                        <input type="url" class="form-control" name="url" placeholder="画像をアップロードしてください。" value="{{ asset($tsundoku->url)?? old( asset('url'))}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3">メモ：</label>
                                        <textarea class="form-control" name="content" placeholder="メモを記入してください。" rows="5">{{ $tsundoku->content ?? old('content')}}</textarea>
                                    </div>
                                    <div class="form-send">
                                        <button type="submit" class="btn btn-large btn-theme">登録</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-delete-{{$tsundoku->id}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modalArticleDeleteLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content2">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="modalArticleDeleteLabel">積読削除</h4>
                            </div>
                            <form method="POST" action="{{ route('tsundoku.delete')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$tsundoku->id}}">
                                <div class="modal-body">
                                    {{ $tsundoku->title }}を削除します。よろしいですか？
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
