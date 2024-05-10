@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row justify-content-center">
    <div class="col-4">
      <img src="{{ asset('storage/images/' . $user['image']) }}" class="img-thumbnail" alt="ユーザー画像" value="{{ $user['image'] }}" >
    </div>
    <div class="col-4">
      <p class="h5">{{ $user['name'] }}</p>
      <p class="h6">{{ $user['profile'] }}</p>
    </div>
  </div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href="{{ route('edit' , ['id' => $user['id']]) }}" class="nav-link" >編集</a>
  <a href="{{ route('delete' , ['id' => $user['id']]) }}" class="nav-link" 
  onclick="confirm('本当に退会しますか？');
  event.preventDefault();
  document.getElementById('delete_form').submit();">退会</a>
  <form id="delete_form" action="{{ route('delete' , ['id' => $user['id']]) }}" method="get" style="display: none;">
    {{ csrf_field() }}
  </form>
</div>
<hr class="border border-dark border-3 opacity-75">
<div class="container text-center">
  <a class="btn btn-primary" href="{{ route('create') }}" role="button">出品商品登録</a>
  <a class="btn btn-primary" href="{{ route('like' , ['id' => $user['id']]) }}" role="button">いいね商品一覧</a>
  <a class="btn btn-primary" href="{{ route('buyhistory' , ['id' => $user['id']]) }}" role="button">購入履歴</a>
  <a class="btn btn-primary" href="{{ route('followuser' , ['id' => $user['id']]) }}" role="button">フォロー一覧</a>
  <a class="btn btn-primary" href="{{ route('sell' , ['id' => $user['id']]) }}" role="button">売上履歴</a>
</div>
<br>
<div class="container text-center">
  <div class="justify-content-center">
    @foreach($sale as $sales)
    <div class="card" style="width:30rem;height:35rem">
        <img src="{{ asset('public/image/' . $sales['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="400">
        <div class="card-body">
          <h5 class="card-title">{{ $sales['price'] }}円</h5>
          <a href="{{ route('detail', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection