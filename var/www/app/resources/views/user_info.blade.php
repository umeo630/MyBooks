@extends('layouts.master')
@section('title', 'ユーザー情報')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row">
            <div class="col-lg-9">
                <div class="main-chart2 bg-white mt">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> アカウント情報</h4>
                    <form class="form-horizontal style-form" method="get">
                        <div class="form-group">
                            <div class="col-sm-2 control-label">名前</div>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$auth->name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">ユーザーID</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$auth->id}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">メールアドレス</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$auth->email}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">作成日時</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$auth->created_at}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">最終更新日時</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$auth->updated_at}}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- col-lg-9-->
            <div class="col-lg-3 ds mt">
                <!-- First Activity -->
                <h4 class="centered">設定</h4>
                <a href="{{ route('user.edit' , ['name' => $auth->name])}}">
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-edit"></i></span>
                        </div>
                        <div class="details">
                            アカウント名編集
                        </div>
                    </div>
                </a>
                <!-- Second Activity -->
                <a href="{{ route('email.edit', ['name' => $auth->name])}}">
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-envelope"></i></span>
                        </div>
                        <div class="details">
                            メールアドレス変更
                        </div>
                    </div>
                </a>
                <!-- Third Activity -->
                <a href="{{ route('password.request')}}">
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-lock"></i></span>
                        </div>
                        <div class="details">
                            パスワード変更
                        </div>
                    </div>
                </a>
                <a href="#!" data-toggle="modal" data-target="#user-delete-{{$auth->id}}">
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-warning"></i></span>
                        </div>
                        <div class="details">
                            アカウント削除
                        </div>
                    </div>
                </a>
            </div>
            <!-- /col-lg-3 -->
        </div>
        <div class="modal fade" id="user-delete-{{$auth->id}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modalUserDeleteLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content2">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="UserDeleteLabel">アカウント削除</h4>
                    </div>
                    <form method="POST" action="{{ route('user.delete' ,['name' => $auth->name])}}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$auth->id}}">
                        <div class="modal-body">
                            {{ $auth->name }}のアカウントを削除します。よろしいですか？
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a class="btn btn-default" data-dismiss="modal">キャンセル</a>
                            <button type="submit" class="btn btn-danger">削除</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
