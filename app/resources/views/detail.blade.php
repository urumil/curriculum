@extends('layouts.app')

@section('content')

@foreach($sale as $sales)
  <img src="{{ asset('public/image/' . $sales['picture']) }}" alt="{{ $sales['picture'] }}" class="rounded mx-auto d-block" width="400" height="400">
  <div class="card-body">
    <p class="card-text">商品名　　{{ $sales['name'] }}</p>
    <p class="card-text">価格　　{{ $sales['price'] }}円</p>
    <p class="card-text">商品の状態　　{{ $sales['quality'] }}</p>
    <p class="card-text">商品の説明　　{{ $sales['comment'] }}</p>
    @foreach($user as $users)
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <img src="{{ $users['profile'] }}" class="img-thumbnail" alt="ユーザー画像">
      <a class="nav-link" href="{{ route('user', ['id' => $sales['user_id']]) }}">{{ $users['name'] }}</a>
    </div>
    @endforeach  
  </div>
  <form action="{{ route('like', ['id' => $sales['id']]) }}" method="get" enctype="multipart/form-data"> 
    <div class='row justify-content-center'>
      <button type='submit' class='btn btn-primary w-25 mt-3'>いいね</button>
    </div> 
  </form>

    <div class="grid text-center">
      <a class="btn btn-primary" href="{{ route('buy', ['id' => $sales['id']]) }}" role="button">購入</a>
    </div>
@endforeach  

@endsection

