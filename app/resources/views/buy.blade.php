@extends('layouts.app')

@section('content')
<h1 class="text-center">購入画面</h1>
<img src="{{ asset('public/image/' . $sale->picture) }}" alt="{{ $sale->picture }}" class="rounded mx-auto d-block" width="400" height="400">
<div class="card-body">
  <p class="card-text">商品名　　{{ $sale->name }}</p>
  <p class="card-text">価格　　{{ $sale->price }}円</p>
  <img src="{{ asset('public/image/' . $sale->user['image']) }}" class="rounded-circle" alt="ユーザー画像" width="85" height="85">{{ $sale->user->name }}
</div>
<div class="card-body">
  <form method="post" action="{{ route('confirm', ['id' => $sale->id]) }}">
    @csrf
    <div>
      <label for="name">氏名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
      <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="氏名を入力" />
      @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('name') }}
        </span>
      @endif
    </div>
    <div>
      <label for="tel">電話番号<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
      <input type="text" name="tel" class="form-control {{ $errors->has('tel') ? 'is-invalid' : '' }}" value="{{ old('tel') }}" placeholder="電話番号を入力"/>
      @if ($errors->has('tel'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('tel') }}
        </span>
      @endif
    </div>
    <div>
      <label for="postcard">郵便番号<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
      <input type="text" name="postcard" class="form-control {{ $errors->has('postcard') ? 'is-invalid' : '' }}" value="{{ old('postcard') }}" placeholder="郵便番号を入力"/>
      @if ($errors->has('postcard'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('postcard') }}
        </span>
      @endif
    </div>
    <div>
      <label for="address">住所<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
      <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{ old('address') }}" placeholder="住所を入力"/>
      @if ($errors->has('address'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('address') }}
        </span>
      @endif
    </div>
    <br>
    <div class="row justify-content-around">
      <div style="display:inline-flex">
        <div class="grid text-center" style="width: 400px; margin: auto;">
          <button type="button" class='btn btn-primary' onClick="history.back()">戻る</button>
          <button type='submit' class='btn btn-primary'>確認</button>
        </div>
      </div>  
    </div> 
  </form>
</div>

@endsection
