@extends('layouts.app')

@section('content')

<img src="{{ asset('public/image/' . $sale->picture) }}" alt="{{ $sale->picture }}" class="rounded mx-auto d-block" width="400" height="400">
<br>
<div class="card-body">
  <p class="card-text">商品名　　{{ $sale->name }}</p>
  <p class="card-text">価格　　{{ $sale->price }}円</p>
  <p class="card-text">商品の状態　　{{ $sale->quality }}</p>
  <p class="card-text">商品の説明　　{{ $sale->comment }}</p>
  <img src="{{ asset('public/image/' . $sale->user['image']) }}" class="rounded-circle" alt="ユーザー画像" width="85" height="85">
        <a class="nav-link" href="{{ route('user', ['id' => $sale['user_id']]) }}">{{ $sale->user->name }}</a>
</div>
<div class='row justify-content-center'>
  <a class="btn btn-primary w-25 mt-3" href="{{ route('saleedit', ['id' => $sale['id']]) }}" role="button">編集</a>
</div> 


@endsection