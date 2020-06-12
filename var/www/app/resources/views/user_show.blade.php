@extends('layouts.master')
@section('title', 'ユーザー情報')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9 main-chart">
                <!--CUSTOM CHART START -->
                <div class="border-head">
                    <h3>USER VISITS</h3>
                </div>
                <div class="row content-panel">
                    <!-- /col-md-4 -->
                    <div class="col-md-4 centered">
                        <div class="profile-pic">
                            <a href="{{ route('user.show',['name' => $user->name])}}"><img src="img/ui-sam.jpg" class="img-circle"></a>
                        </div>
                    </div>
                    <div class="col-md-4 profile-text">
                        <h3><a href="{{ route('user.show',['name' => $user->name])}}">{{ $user->name}}</a></h3>
                        <h6>Main Administrator</h6>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 profile-text mt mb centered">
                        @if (Auth::id() !== $user->id)
                        <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('user.follow', ['name' => $user->name])}}"></follow-button>
                        @endif
                        <h4>1922</h4>
                        <h6>FOLLOWERS</h6>
                        <h4>290</h4>
                        <h6>FOLLOWING</h6>
                        <h4>$ 13,980</h4>
                        <h6>MONTHLY EARNINGS</h6>
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->
            </div>
            <!-- **********************************************************************************************************************************************************
            RIGHT SIDEBAR CONTENT
            *********************************************************************************************************************************************************** -->
            <div class="col-lg-3 ds">
                <div class="desc">
                    <div class="thumb">
                        <span class="badge bg-theme"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="details">
                        <p>ユーザー情報</p>
                    </div>
                </div>
                <div class="desc">
                    <div class="thumb">
                        <span class="badge bg-theme"><i class="fa fa-book"></i></span>
                    </div>
                    <div class="details">
                        <p>読んだ本一覧</p>
                    </div>
                </div>
                <div class="desc">
                    <div class="thumb">
                        <span class="badge bg-theme"><i class="fa fa-star"></i></span>
                    </div>
                    <div class="details">
                        <p>いいねした記事</p>
                    </div>
                </div>
                <div class="desc">
                    <div class="thumb">
                        <span class="badge bg-theme"><i class="fa fa-users"></i></span>
                    </div>
                    <div class="details">
                        <p>フォロワー</p>
                    </div>
                </div>
                <div class="desc">
                    <div class="thumb">
                        <span class="badge bg-theme"><i class="fa fa-group"></i></span>
                    </div>
                    <div class="details">
                        <p>フォロー中のユーザー</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
