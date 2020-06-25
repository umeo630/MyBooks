<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <title>新規会員登録</title>

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
    <header class="header black-bg">
        <a href="index.html" class="logo"><b>MY<span>BOOKS</span></b></a>
    </header>

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="register-page">
        <div class="container">
            <form class="form-register" action="{{ route('register') }}" method="POST">
                @csrf

                <h2 class="form-register-heading">新規会員登録</h2>
                <div class="register-wrap">

                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('ユーザー名') }}</label>
                        <input id="name" type="text" class="form-control @error ('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class=" form-label">{{ __('メールアドレス') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class=" form-label">{{ __('パスワード') }}</label>


                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class=" form-label">{{ __('パスワード再確認') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>

                    <button type="submit" class="btn btn-theme btn-block ">
                        {{ __('登録') }}
                    </button>

                    <div class="password_forget">
                        <hr>
                        <!--  <div class="register-social-link centered">
                            <p>SNS経由で登録する場合はこちら</p>
                            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                        </div> -->
                        <div class="registration">
                            ログインはこちら<br />
                            <a class="" href="login">
                                ログイン
                            </a>
                        </div>
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
        "{{ asset('/img/framework/register-bg.jpg') }}", {
      speed: 500
    });
    </script>
</body>

</html>
