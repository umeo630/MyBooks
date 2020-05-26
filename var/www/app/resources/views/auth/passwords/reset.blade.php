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
                    <h4 class="modal-title">パスワード再設定</h4>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="form-label">メールアドレス</label>
                            <input id="email" type="email" name="email" autocomplete="email" value="{{ old('email') }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">パスワード</label>
                            <input id="password" type="password" name="password" autocomplete="new-password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-label">パスワード再確認</label>
                            <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
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
