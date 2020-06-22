<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <h5 class="centered">@auth
                {{Auth::user()->name}}@else ゲスト　@endauth</h5>
            <li class="mt">
                @auth
                <a href="{{route('user.show',[Auth::user()->name])}}">
                    <i class="fa fa-dashboard"></i>
                    <span>マイページ</span>
                </a>
            <li class="sub-menu">
                <a href="{{route('article.register')}}">
                    <i class="fa fa-book"></i>
                    <span>マイ記事管理</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>設定</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('user.info',[Auth::user()->name])}}">アカウント情報</a></li>
                </ul>
            </li>
            @endauth
            </li>
            <!---
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-comments-o"></i>
                    <span>読書</span>
                </a>
                <ul class="sub">
                    <li><a href="lobby.html">マイ記事一覧</a></li>
                    <li><a href="chat_room.html">いいねした記事</a></li>
                    <li><a href="chat_room.html">新規記事登録</a></li>
                </ul>
            </li>
        -->
        </ul>
    </div>
</aside>
