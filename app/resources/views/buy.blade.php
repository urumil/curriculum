@extends('layouts.app')

@section('content')
<h1 class="text-center">購入画面</h1>
<img src="{{ asset('public/image/' . $sale->picture) }}" alt="{{ $sale->picture }}" class="rounded mx-auto d-block">
<div class="card-body">
  <p class="card-text">商品名　　{{ $sale->name }}</p>
  <p class="card-text">価格　　{{ $sale->price }}円</p>
  <img src="{{ $sale->user->image }}" class="img-thumbnail" alt="ユーザー画像">{{ $sale->user->name }}
</div>
<div class="card-body">
  <form method="post" action="{{ route('confirm', ['id' => $sale->id]) }}">
    @csrf
    <div>
      <label for="name">氏名</label>
      <input type="text" name="name" value="{{ old('name') }}" placeholder="氏名を入力" />
    </div>
    <div>
      <label for="tel">電話番号</label>
      <input type="text" name="tel" value="{{ old('tel') }}" placeholder="電話番号を入力"/>
    </div>
    <div>
      <label for="postcard">郵便番号</label>
      <input type="text" name="postcard" value="{{ old('postcard') }}" placeholder="郵便番号を入力"/>
    </div>
    <div>
      <label for="address">住所</label>
      <input type="text" name="address" value="{{ old('address') }}" placeholder="住所を入力"/>
    </div>
    <div class='row justify-content-center'>
      <button type="button" class='btn btn-primary' onClick="history.back()">戻る</button>
      <button type='submit' class='btn btn-primary'>確認</button>
    </div> 
  </form>
</div>

@endsection
