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
                                        <div class="list-group-main col-lg-4 col-md-4 col-sm-4 mt">
                                            <a href="{{ route('user.show',[$article_favorite->user->name])}}"><i class="fa fa-user-circle fa-3x mr-1"></i></a>
                                            <div class="font-weight-bold">
                                                <a href="{{ route('user.show',[$article_favorite->user->name])}}">{{$article_favorite->user->name}}</a>
                                            </div>
                                            <a href="{{ route('article.details',[$article_favorite->id])}}" class="list-group-item flex-column align-items-start text-center">
                                                <div class="d-flex justify-content-between">
                                                    <h3 class="mb-1">{{ $article_favorite->article_title}}</h3>
                                                    <p class="text-muted">{{ $article_favorite->create_at}}</p>
                                                    <img src="{{ $article_favorite->url}}" width="150" height="225">
                                                    <h4 class="mb-1">{{ $article_favorite->book_title}}</h4>
                                                    <div class="text">
                                                        {!! nl2br(e( $article_favorite->book_content )) !!}
                                                    </div>
                                                </div>
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
