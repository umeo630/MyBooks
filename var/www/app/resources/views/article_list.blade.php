@extends('layouts.master')
@section('title', 'みんなの記事一覧')

@section('stylesheet')
<!-- 固有css -->
@endsection
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="container">
            <!-- フラッシュメッセージ -->
            @if(session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message')}}
            </div>
            @endif

            <div class="list-group mt">
                @include('layouts.article')
            </div>
        </div>
        <div class="pagiwrapper">
            <div class="pagination">{{ $articles->links()}}</div>
        </div>
    </section>
</section>
@endsection
