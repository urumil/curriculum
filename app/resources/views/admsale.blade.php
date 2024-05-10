@extends('layouts.app')

@section('content')

<img src="{{ asset('public/image/' . $sale->picture) }}" alt="{{ $sale->picture }}" class="rounded mx-auto d-block" width="400" height="400">
<div class="card-body">
  <p class="card-text">商品名　　{{ $sale->name }}</p>
  <p class="card-text">価格　　{{ $sale->price }}円</p>
  <p class="card-text">商品の状態　　{{ $sale->quality }}</p>
  <p class="card-text">商品の説明　　{{ $sale->comment }}</p>
</div>
<div class="card-body">
  <img src="{{ $sale->user->image }}" class="img-thumbnail" alt="ユーザー画像">
  <a class="nav-link" href="{{ route('admuser', ['id' => $sale['user_id']]) }}">{{ $sale->user->name }}</a>
</div>
<a href="{{ route('softdelete_sale', ['id' => $sale['id']]) }}">
  <button class='btn btn-primary'>商品を非表示にする</button>
</a>


@endsection