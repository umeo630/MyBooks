@extends('layouts.master')
@section('title', 'ユーザー情報')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="row content-panel2">
                    <!-- /col-md-4 -->
                    <div class="col-md-4 centered">
                        <div class="profile-pic">
                            <a href="{{ route('user.show',['name' => $user->name])}}"><i class="fa fa-user-circle fa-4x"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 profile-text2">
                        <h3><a href="{{ route('user.show',['name' => $user->name])}}">{{ $user->name}}</a></h3>
                        <h6>フォロワー数 {{ $user->count_followers}}</h6>
                        <h6 class="ml-1">フォロ-数 {{ $user->count_followings}}</h6>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 profile-text2 mt mb centered">
                        @if (Auth::id() !== $user->id)
                        <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('user.follow', ['name' => $user->name])}}"></follow-button>
                        @endif
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->
            </div>
            <!-- **********************************************************************************************************************************************************
            RIGHT SIDEBAR CONTENT
            *********************************************************************************************************************************************************** -->
            <div class="col-lg-12 mt">
                <div class="row content-panel2">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a data-toggle="tab" href="#articles"><span class="badge bg-theme"><i class="fa fa-book"></i></span> 記事一覧</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#articles_favorites" class="contact-map"><span class="badge bg-theme"><i class="fa fa-star"></i></span> いいねした記事</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#follower"><span class="badge bg-theme"><i class="fa fa-group"></i></span> フォロワー</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#followings"><span class="badge bg-theme"><i class="fa fa-group"></i></span> フォロー中のユーザー</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tsundoku"><span class="badge bg-theme"><i class="fa fa-book"></i></span> 積読一覧</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /panel-heading -->
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="articles" class="tab-pane active">
                                <div class="row">
                                    <div class="list-group mt">
                                        @include('layouts.article')
                                    </div>
                                </div>
                                <!-- /OVERVIEW -->
                            </div>
                            <!-- /tab-pane -->
                            <div id="articles_favorites" class="tab-pane">
                                <div class="row">
                                    <div class="list-group mt">
                                        @foreach ($articles_favorites as $article_favorite)
                                        <div class="col-lg-4 col-md-4 col-sm-4 mb">
                                            <a href="{{ route('user.show',[$article_favorite->user->name])}}"><i class="fa fa-user-circle fa-3x mr-1"></i></a>
                                            <div class="font-weight-bold">
                                                <a href="{{ route('user.show',[$article_favorite->user->name])}}" class="user-name">{{$article_favorite->user->name}}</a>
                                            </div>
                                            <a href="{{ route('article.details',[$article_favorite->id])}}" class='list-group-item text-center'>
                                                <div class="servicetitle">
                                                    <h5>{!! nl2br(e(Str::limit($article_favorite->book_title, 25, ' ...'))) !!}</h5>
                                                    <hr>
                                                </div>
                                                <p class="text-muted">{{ $article_favorite->create_at->format('Y/m/d')}}</p>
                                                <img src="{{ $article_favorite->url ?? 'http://design-ec.com/d/e_others_50/l_e_others_501.png'}}" width="100" height="150">
                                                <p class="text mt">
                                                    {!! nl2br(e(Str::limit($article_favorite->book_content, 50, ' ...'))) !!}
                                                </p>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                            <!-- /tab-pane -->
                            <div id="follower" class="tab-pane">
                                <div class="row">
                                    @foreach ($followers as $follower)
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt">
                                        <div class="showback">
                                            @if (Auth::id() !== $follower->id)
                                            <follow-button class="pull-right" :initial-is-followed-by='@json($follower->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('user.follow', ['name' => $follower->name])}}"></follow-button>
                                            @endif
                                            <a href="{{ route('user.show', ['name' => $follower->name])}}"><i class="fa fa-user-circle fa-3x mr-1"></i></a>
                                            <h4><a href="{{ route('user.show', ['name' => $follower->name])}}">{{$follower->name}}</a></h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="followings" class="tab-pane">
                                <div class="row">
                                    @foreach ($followings as $following)
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt">
                                        <div class="showback">
                                            @if (Auth::id() !== $following->id)
                                            <follow-button class="pull-right" :initial-is-followed-by='@json($following->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('user.follow', ['name' => $following->name])}}"></follow-button>
                                            @endif
                                            <a href="{{ route('user.show', ['name' => $following->name])}}"><i class="fa fa-user-circle fa-3x mr-1"></i></a>
                                            <h4><a href="{{ route('user.show', ['name' => $following->name])}}">{{$following->name}}</a></h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="tsundoku" class="tab-pane">
                                <div class="row">
                                    <div class="text-center">
                                        <h1><i class="fa fa-money"></i></h1>
                                        <h3>¥{{ $tsundoku_sum }}</h3>
                                        <h6>積読合計金額</h6>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt">
                                        <div class="article-wrapper">
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
                                                        <p class="mb-1"><small>¥{{ $tsundoku->price}}</small></p><img src="{{$tsundoku->url ?? 'http://design-ec.com/d/e_others_50/l_e_others_501.png'}}" width="100" height="150">
                                                        <p class=" mb-1">{!! nl2br(e(Str::limit($tsundoku->content, 30, ' ...'))) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

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
                                </div>
                            </div>
                        </div> <!-- /tab-pane -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
        </div>
    </section>
</section>
@endsection
