@extends('layouts.app')

@section('content')
<h1 class="text-center">確認画面</h1>
@foreach($sale as $sales)
<img src="{{ asset('image/' . $sales['picture']) }}" alt="{{ $sales['picture'] }}" class="rounded mx-auto d-block">
<div class="card-body">
  <p class="card-text">商品名　　{{ $sales['name'] }}</p>
  <p class="card-text">価格　　{{ $sales['price'] }}円</p>
  <img src="..." class="img-thumbnail" alt="...">ユーザー名
</div>
@endforeach  
<div class="card-body">
    <form action="{{ route('buy', ['id' => $sales['id']]) }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">氏名</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" name="name" placeholder="氏名を入力">
          </div>
        </div>
        <div class="form-group row">
          <label for="tel" class="col-sm-2 col-form-label">電話番号</label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" name="tel" placeholder="電話番号を入力">
          </div>
        </div>
        <div class="form-group row">
          <label for="postcard" class="col-sm-2 col-form-label">郵便番号</label>
          <div class="col-sm-10">
            <input type="postcard" class="form-control" name="postcard" placeholder="郵便番号を入力">
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-2 col-form-label">住所</label>
          <div class="col-sm-10">
            <input type="address" class="form-control" name="address" placeholder="住所を入力">
          </div>
        </div>
        <div class="container text-center">
          <a class="btn btn-primary" onClick="history.back()" role="button">戻る</a>
          <a class="btn btn-primary" href="{{ route('check' , ['id' => $sales['id']]) }}" role="button">確認</a>
        </div>
    </form>
</div>

@endsection