@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-4">
      <img src="{{ asset('public/image/' . $user['image']) }}" class="img-thumbnail" alt="ユーザー画像" value="{{ $user['image'] }}" >
    </div>
    <div class="col-4">
      <p class="text-center h5">{{ $user['name'] }}</p>
      <p class="text-center h6">{{ $user['profile'] }}</p>
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
  <a class="btn btn-primary" href="{{ route('likegoods' , ['id' => $user['id']]) }}" role="button">いいね商品一覧</a>
  <a class="btn btn-primary" href="{{ route('buyhistory' , ['id' => $user['id']]) }}" role="button">購入履歴</a>
  <a class="btn btn-primary" href="{{ route('followuser' , ['id' => $user['id']]) }}" role="button">フォロー一覧</a>
  <a class="btn btn-primary" href="{{ route('sell' , ['id' => $user['id']]) }}" role="button">売上履歴</a>
</div>
<br>
<div class="container text-center">
    <div class="row">
    @foreach($sale as $sales)
        <div class="col-sm-4 col-12 col-md-6 col-lg-4">
            <div class="card">
                <img src="{{ asset('public/image/' . $sales['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="250">
                <div class="card-body">
                    <h2 class="card-title">{{ $sales['price'] }}円</h5>
                    <a href="{{ route('mysaledetail', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection