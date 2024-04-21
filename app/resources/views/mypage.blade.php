@extends('layouts.app')

@section('content')
@foreach($user as $users)
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-4">
        <img src="" class="img-thumbnail" alt="ユーザー画像" value="{{ $users['image'] }}">
      </div>
      <div class="col-4">
        <p class="h5">{{ $users['name'] }}</p>
        <p class="h6">{{ $users['profile'] }}</p>
      </div>
    </div>
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('edit' , ['id' => $users['id']]) }}" class="nav-link" >編集</a>
    <a href="{{ route('register') }}" class="nav-link" >退会</a>
  </div>
@endforeach
<hr class="border border-dark border-3 opacity-75">
<div class="container text-center">
  <a class="btn btn-primary" href="{{ route('create') }}" role="button">出品商品登録</a>
  <a class="btn btn-primary" href="{{ route('like' , ['id' => $users['id']]) }}" role="button">いいね商品一覧</a>
  <a class="btn btn-primary" href="{{ route('buyhistory' , ['id' => $users['id']]) }}" role="button">購入履歴</a>
  <a class="btn btn-primary" href="{{ route('follow' , ['id' => $users['id']]) }}" role="button">フォロー一覧</a>
  <a class="btn btn-primary" href="{{ route('sell' , ['id' => $users['id']]) }}" role="button">売上履歴</a>
</div>
<div class="container">
  <div class="container text-center">
    <div class="d-flex justify-content-center">
      @foreach($sale as $sales)
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="sales_picture">
          <div class="card-body">
            <h5 class="card-title">{{ $sales['price'] }}円</h5>
            <a href="{{ route('detail', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection