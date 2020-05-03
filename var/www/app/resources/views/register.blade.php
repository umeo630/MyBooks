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
        <a href="index.html" class="logo"><b>BOOK<span>HISTORY</span></b></a>
    </header>

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="register-page">
        <div class="container">
            <form class="form-register" action="index.html">
                <h2 class="form-register-heading">新規会員登録</h2>
                <div class="register-wrap">
                    <input type="text" class="form-control" placeholder="名前" autofocus>
                    <br>
                    <input type="text" class="form-control" placeholder="メールアドレス" autofocus>
                    <br>
                    <input type="password" class="form-control" placeholder="パスワード">
                    <br>
                    <input type="password" class="form-control" placeholder="パスワード再確認">
                    <br>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit">アカウント登録</button>
                    <div class="password_forget">
                        <hr>
                        <div class="register-social-link centered">
                            <p>SNS経由で登録する場合はこちら</p>
                            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                        </div>
                        <div class="registration">
                            ログインはこちら<br />
                            <a class="" href="login.html">
                                ログイン
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
        "{{ asset('/img/framework/register-bg.jpg') }}", {
      speed: 500
    });
  </script>
  </body>

</html>
