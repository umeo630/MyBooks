@extends('layouts.master')
@section('title', 'パスワード再設定')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">パスワードをお忘れですか?</h4>
                </div>
                <div class="modal-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <p>パスワードをリセットするには、メールアドレスを入力してください。</p>
                        <div class="form-group">
                            <input type="text" name="email" placeholder="メールアドレス" autocomplete="email" value="{{ old('email') }}" class="form-control placeholder-no-fix">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-theme" type="submit">送信</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
