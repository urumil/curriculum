@extends('layouts.app')

@section('content')

<img src="{{ asset('public/image/' . $sale->picture) }}" alt="{{ $sale->picture }}" class="rounded mx-auto d-block" width="400" height="400">
<br>
<div class="card-body">
  <p class="card-text">商品名　　{{ $sale->name }}</p>
  <p class="card-text">価格　　{{ $sale->price }}円</p>
  <p class="card-text">商品の状態　　{{ $sale->quality }}</p>
  <p class="card-text">商品の説明　　{{ $sale->comment }}</p>
  <td>
    @if($like_model->exists(Auth::user()->id, $sale->id))
      <p class="favorite-marke">
        <a class="js-like-toggle loved" href="" data-postid="{{ $sale->id }}">
          <i class="fas fa-heart fa-2x"></i>
        </a>
        <span class="likesCount">{{ $sale->likes_count}}</span>
      </p>
    @else
      <p class="favorite-marke">
        <a class="js-like-toggle" href="" data-postid="{{ $sale->id }}">
          <i class="fas fa-heart fa-2x"></i>
        </a>
        <span class="likesCount">{{ $sale->likes_count}}</span>
      </p>
    @endif
  </td> 
  <img src="{{ asset('public/image/' . $sale->user['image']) }}" class="rounded-circle" alt="ユーザー画像" width="85" height="85">
        <a class="nav-link" href="{{ route('user', ['id' => $sale['user_id']]) }}">{{ $sale->user->name }}</a>
</div>
<div class="row justify-content-around">
  <div style="display:inline-flex">
    <a class="btn btn-primary" href="{{ route('buy', ['id' => $sale['id']]) }}" role="button">購入</a>
  </div>
</div>

@endsection

