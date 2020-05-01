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