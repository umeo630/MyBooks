@extends('layouts.master')
@section('title', 'ユーザー情報')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> アカウント情報</h4>
                        <form class="form-horizontal style-form" method="get">
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-2 control-label">名前</div>
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
                <!-- col-lg-12-->
            </div>
    </section>
</section>
@endsection
