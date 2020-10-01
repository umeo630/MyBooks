@extends('layouts.master')
@section('main-content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-lg-12 col-md-12 col-sm-12 mt">
                <h4 class="title">簡単検索</h4>
                <form enctype="multipart/form-data" action="{{ route('tsundoku_register.index')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="show" class="form-control" placeholder="書籍名を入力してください。">
                    </div>
                    <button type="submit" class="btn btn-sm btn-theme">検索</button>
                </form>
            </div>

            @foreach ($items as $item)
            <div class="mt col-lg-4 col-md-4 col-sm-4">
                <div class="text-center">
                    @if (array_key_exists("imageLinks", $item["volumeInfo"]))
                    <div class="col-md-6">
                        <img src="{{ $item["volumeInfo"]["imageLinks"]["thumbnail"]}}" width="150" height="225">
                    </div>
                    @else
                    <div class="col-md-6">
                        <img src="http://design-ec.com/d/e_others_50/l_e_others_501.png" width="150" height="225">
                    </div>
                    @endif
                    <div class="col-md-6">
                        <h5 class="mb-1">{{ $item["volumeInfo"]["title"]}}</h5>
                        @if (array_key_exists("authors", $item["volumeInfo"]))
                        <p>{{ $item["volumeInfo"]["authors"][0]}}</p>
                        @endif
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modal-api-register-{{$item["id"]}}">かんたん入力</a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-api-register-{{$item["id"]}}" tabindex="-1" role="dialog" aria-labelledby="modalApiRegisterLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content2">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="modalApiRegisterLabel">積読登録</h4>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" class="article-reegister-form" role="form" action="{{ route ('tsundoku.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="mt-3">読んだ本：</label>
                                    <input type="text" name="title" class="form-control" placeholder="読んだ本を記入してください。" value="{{ $item["volumeInfo"]["title"]}}">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3">読了予定日：</label>
                                    <input type="date" class="form-control" name="scheduled_date">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3">金額：</label>
                                    <input type="number" class="form-control" name="price" placeholder="金額を入力してください。">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3">サムネイル：</label>
                                    <input type="url" class="form-control" name="url" value="{{ $item["volumeInfo"]["imageLinks"]["thumbnail"] ?? ""}}">
                                </div>
                                <div class="form-group">
                                    <label class="mt-3">メモ：</label>
                                    <textarea class="form-control" name="content" placeholder="メモを記入してください。" rows="5"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">登録</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->

@endsection
