@extends('layouts.app')

@section('content')
<h1 class="text-center">いいね商品一覧</h1>
<div class="container text-center">
  <div class="row">
            @foreach($like as $like)
            <div class="col-sm-4 col-12 col-md-6 col-lg-4">
               <div class="card">
                    <img src="{{ asset('public/image/' . $like->sale['picture']) }}" class="card-img-top" alt="like_picture" width="210" height="210">
                    <div class="card-body">
                        <h5 class="card-title">{{ $like->sale['price'] }}円</h5>
                        <a href="{{ route('detail', ['id' => $like->sale['id']]) }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection