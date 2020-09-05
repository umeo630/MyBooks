<!--@foreach ($articles as $article)
<div class="list-group-main mt col-lg-4 col-md-4 col-sm-4">
    <a href="{{ route('user.show',[$article->user->name])}}"><i class="fa fa-user-circle fa-3x mr-1"></i></a>
    <div class="font-weight-bold">
        <a href="{{ route('user.show',[$article->user->name])}}" class="user-name">{{$article->user->name}}</a>
    </div>
    <a href="{{ route('article.details',[$article->id])}}" class="list-group-item flex-column align-items-start text-center">
        <div class="d-flex justify-content-between">
            <h4 class="mb-1">{{ $article->book_title}}</h4>
            <p class="text-muted">{{ $article->create_at}}</p>
            <img src="{{ $article->url ?? 'http://design-ec.com/d/e_others_50/l_e_others_501.png'}}" width="100" height="150">
            <div class="text">
                {!! nl2br(e(Str::limit($article->book_content, 80, ' ...'))) !!}
            </div>
        </div>
    </a>
</div>
@endforeach
-->
@foreach ($articles as $article)
<div class="col-lg-4 col-md-4 col-sm-6 pb">
    <a href="{{ route('user.show',[$article->user->name])}}"><i class="fa fa-user-circle fa-3x mr-1"></i></a>
    <div class="font-weight-bold">
        <a href="{{ route('user.show',[$article->user->name])}}" class="user-name">{{$article->user->name}}</a>
    </div>
    <a href="{{ route('article.details',[$article->id])}}" class='list-group-item text-center'>
        <div class="servicetitle">
            <h5>{!! nl2br(e(Str::limit($article->book_title, 25, ' ...'))) !!}</h5>
            <hr>
        </div>
        <p class="text-muted">{{ $article->create_at->format('Y/m/d')}}</p>
        <img src="{{ $article->url ?? 'http://design-ec.com/d/e_others_50/l_e_others_501.png'}}" width="100" height="150">
        <p class="text mt">
            {!! nl2br(e(Str::limit($article->book_content, 50, ' ...'))) !!}
        </p>
    </a>
</div>
@endforeach
