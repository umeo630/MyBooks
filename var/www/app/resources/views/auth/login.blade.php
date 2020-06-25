<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <title>ログイン</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/framework/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/framework/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashio/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashio/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

</head>

<body>
    <!--ヘッダー-->
    <header class="header header-register black-bg">
        <a href="index.html" class="logo"><b>MY<span>BOOKS</span></b></a>
    </header>
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="POST" action="{{ route('login') }}">
                @csrf

                <h2 class="form-login-heading">MYBOOKSにログイン</h2>
                <div class="login-wrap">
                    <div class="form-group">
                        <label for="email" class="form-label ">{{ __('メールアドレス') }}</label>
                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('パスワード') }}</label>

                        <div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('パスワードを保存') }}
                            </label>
                        </div>
                    </div>

                    <div class="password_forget">
                        <button type="submit" class="btn btn-theme btn-block">
                            {{ __('ログイン') }}
                        </button>

                        <hr>

                        <a href="{{ route('password.request')}}">
                            {{ __('パスワードをお忘れの場合') }}
                        </a>
                    </div>

                    <!-- <div class="login-social-link centered">
                        <p>SNS経由でログインする場合はこちら</p>
                        <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                        <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                    </div> -->
                    <div class="registration mt">
                        アカウントの新規作成はこちら<br />
                        <a class="" href="{{ route('register')}}">
                            新規作成
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/js/framework/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/framework/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/framework/jquery.backstretch.min.js') }}"></script>
    <script>
        $.backstretch(
        "{{ asset('/img/framework/login-bg.jpg') }}", {
      speed: 500
    });
    </script>

</body>

</html>
