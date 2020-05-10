<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right"></div>
    </div>
    <a href="index.html" class="logo"><b>My<span>Books</span></b></a>
    <div class="nav notify-row" id="top_menu">
        <ul class="nav top-menu">
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-theme">2</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">2件の新しいお知らせがあります</p>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                            あなたの記事がいいねされました
                            <span class="small italic">4 分前</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="label label-warning"><i class="fa fa-bell"></i></span>
                            あなたの記事がポリシー違反により、運営から削除されました。
                            <span class="small italic">30 分前</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">全てのお知らせを確認する</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            @auth
            <li><a href="{{ route('article.register') }}" class="logout">マイ記事管理</a></li>
            <li><a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <li><a href="{{ route('login') }}" class="logout">ログイン</a></li>
            <li><a href="{{ route('register') }}" class="logout">ユーザー登録</a></li>
            @endauth
        </ul>
    </div>
</header>
