@extends('layouts.app')

@section('content')

@foreach($sale as $sales)
  <img src="{{ asset('image/' . $sales['picture']) }}" alt="{{ $sales['picture'] }}" class="rounded mx-auto d-block">
  <div class="card-body">
    <p class="card-text">商品名　　{{ $sales['name'] }}</p>
    <p class="card-text">価格　　{{ $sales['price'] }}円</p>
    <p class="card-text">商品の状態　　{{ $sales['quality'] }}</p>
    <p class="card-text">商品の説明　　{{ $sales['comment'] }}</p>
    <img src="..." class="img-thumbnail" alt="...">ユーザー名
  </div>
  <div class="grid text-center">
    <button type="button" class="btn btn-outline-danger">いいね</button>
    <a class="btn btn-primary" href="{{ route('buy', ['id' => $sales['id']]) }}" role="button">購入</a>
  </div>
@endforeach  

@endsection

