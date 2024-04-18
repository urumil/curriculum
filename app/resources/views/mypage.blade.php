@extends('layouts.app')

@section('content')
@foreach($user as $users)
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-4">
        <img src="../../../image/freemarket.png" class="img-thumbnail" alt="...">
      </div>
      <div class="col-4">
        <p class="h5">{{ $users['name'] }}</p>
        <p class="h6">自己紹介</p>
      </div>
    </div>
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('edit') }}" class="nav-link" >編集</a>
    <a href="{{ route('register') }}" class="nav-link" >退会</a>
  </div>
@endforeach
<hr class="border border-dark border-3 opacity-75">
<div class="container text-center">
  <a class="btn btn-primary" href="{{ route('create') }}" role="button">出品商品登録</a>
  <button type="button" class="btn btn-secondary" href="">いいね</button>
  <button type="button" class="btn btn-secondary" href="">購入履歴</button>
  <button type="button" class="btn btn-secondary" href="">フォロー一覧</button>
  <button type="button" class="btn btn-secondary" href="">売上履歴</button>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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