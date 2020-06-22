@extends('layouts.master')
@section('title', 'メールアドレス変更')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> メールアドレス変更</h4>
                    <form class="form-horizontal style-form" method="POST" action="{{ route('email.update' , ['name' => $auth->name])}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">メールアドレス</label>
                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary ml-auto">変更</button>
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
