@extends('layouts.app')

@section('content')
<h1 class="text-center">確認画面</h1>
<img src="{{ asset('public/image/' . $sale->picture) }}" alt="{{ $sale->picture }}" class="rounded mx-auto d-block">
<div class="card-body">
  <p class="card-text">商品名　　{{ $sale->name }}</p>
  <p class="card-text">価格　　{{ $sale->price }}円</p>
  <img src="{{ asset('public/image/' . $sale->user['image']) }}" class="img-thumbnail" alt="ユーザー画像">{{ $sale->user->name }}
</div>
<div class="card-body">
    <form action="{{ route('send', ['id' => $id]) }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <input type='hidden' name='name' value="{{ $contact['name'] }}">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">氏名</label>
          <div class="col-sm-10">
            {{ $contact['name'] }}
          </div>
        </div>
        
        <input type='hidden' name='tel' value="{{ $contact['tel'] }}">
        <div class="form-group row">
          <label for="tel" class="col-sm-2 col-form-label">電話番号</label>
          <div class="col-sm-10">
            {{ $contact['tel'] }}
          </div>
        </div>

        <input type='hidden' name='postcard' value="{{ $contact['postcard'] }}">
        <div class="form-group row">
          <label for="postcard" class="col-sm-2 col-form-label">郵便番号</label>
          <div class="col-sm-10">
            {{ $contact['postcard'] }}
          </div>
        </div>

        <input type='hidden' name='address' value="{{ $contact['address'] }}">
        <div class="form-group row">
          <label for="address" class="col-sm-2 col-form-label">住所</label>
          <div class="col-sm-10">
            {{ $contact['address'] }}
          </div>
        </div>
        <div class='row justify-content-center'>
          <button type="button" class='btn btn-primary' onClick="history.back()">戻る</button>
          <button type='submit' class='btn btn-primary'>購入する</button>
        </div> 
    </form>
</div>

@endsection