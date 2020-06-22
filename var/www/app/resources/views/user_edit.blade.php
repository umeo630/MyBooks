@extends('layouts.master')
@section('title', 'アカウント名編集')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> アカウント名編集</h4>
                    <form class="form-horizontal style-form" method="POST" action="{{ route('user.update' , ['name' => $auth->name])}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">名前</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" 　value="{{$auth->name ?? old('name')}}">
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary ml-auto">保存</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- col-lg-12-->
        </div>
        <!-- /row -->

    </section>
</section>
@endsection
