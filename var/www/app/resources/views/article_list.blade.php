@extends('layouts.master')
@section('title', 'みんなの記事一覧')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="container">
            <div class="list-group mt">
                @include('layouts.article')
                <div class="text-center">{{ $articles->links()}}</div>
            </div>
        </div>
    </section>
</section>
@endsection
