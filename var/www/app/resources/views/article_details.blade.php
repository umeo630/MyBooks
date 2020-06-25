@extends('layouts.master')
@section('title', 'みんなの記事詳細')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="chat-room mt">
            <aside class="right-side">
                <div class="room-desk2">
                    <img src="/img/framework/login-bg.jpg" alt="" width="100%" height="auto">
                    <div class="invite-row2">
                        <article-favorite :initial-is-favorited-by='@json($article->isFavoritedBy(Auth::user()))' :initial-count-favorites='@json($article->count_favorites)' :authorized='@json(Auth::check())' endpoint="{{ route('article.favorite', ['id' => $article->id]) }}"></article-favorite>
                    </div>
                </div>
            </aside>
            <aside class="mid-side">
                <div class="chat-room-head2">
                    <h2>{{$article->article_title}}</h2>
                    <h3><a href="{{ route('user.show',[$article->user->name])}}">{{$article->user->name}}</a></h3>
                </div>
                <div class="room-desk">
                    <h3>読んだ本：{{$article->book_title}}</h3>
                    <h4>作成日：{{$article->create_at}} <span>／</span>価格：{{$article->book_price}}</h4>
                    <h3>★★★★★ {{$article->book_evaluation}}</h3>
                    <div class="mt">
                        <h4>感想</h4>
                        <br>
                        <p>{{$article->book_content}}</p>
                    </div>
                </div>
            </aside>
        </div>
        <div class="chat-room">
            <aside class="right-side">
                <div class="invite-row3 text-center">
                    <h4>{{$article->user->name}} さんの他の記事</h4>
                </div>
                <ul class="chat-available-user">
                    @foreach ($user_articles as $user_article)
                    @if($user_article->id !== $article->id)
                    <li>
                        <a href="{{ route('article.details',[$user_article->id])}}">
                            <img width="50" height="75" src="img/framework/register-bg.jpg" width="32">
                            {{$user_article->article_title}}
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </aside>
            <aside class="mid-side">
                <div class="chat-room-head2 text-center">
                    <h4>コメント一覧</h4>
                </div>
                @foreach ($comments as $comment)
                <div class="group-rom mb">
                    <div class="first-part"><a href="{{ route('user.show',['name' => $comment->user->name])}}">{{$comment->user->name}}</a></div>
                    <div class="second-part">
                        {{$comment->comment}}
                    </div>
                    <div class="third-part">
                        @auth
                        @if ($comment->user->id == Auth::user()->id)
                        <div class="text-right">
                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#comment-delete-{{$comment->id}}">削除</a>
                        </div>
                        @endif
                        @endauth
                    </div>
                    <div class="modal fade" id="comment-delete-{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="comment-delete-{{$comment->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="comment-delete-{{$comment->id}}Label">コメント削除</h4>
                                </div>
                                <form action="{{ route('comment.delete')}}" 　method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $comment->id}}">
                                    <input type="hidden" name="article_id" value="{{ $comment->article_id}}">
                                    <div class="modal-body">
                                        コメントを削除します。よろしいですか？
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a class="btn btn-default" data-dismiss="modal">キャンセル</a>
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @auth
                <form action="{{ route('comment.store')}}" method="POST">
                    @csrf
                    <div class="chat-txt text-right">
                        <input type="text" class="form-control" name="comment">
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                    <button class="btn btn-theme" type="summit">コメントする</button>
                </form>
                @endauth
            </aside>
        </div>
    </section>
</section>
@endsection
