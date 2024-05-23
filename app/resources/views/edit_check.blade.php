@extends('layouts.app')

@section('content')
<h1 class="text-center">確認画面</h1>
<div class="card-body">
    <form action="{{ route('complete', $sale['id']) }}" method="post" enctype="multipart/form-data"> 
      @csrf
      <div>商品画像</div>
      <div class="form-group row">
        <img src="{{ asset('public/image/' . $data['contact_pic']['picture']) }}" alt="{{ $sale->picture }}" class="rounded mx-auto d-block" width="400" height="400">
      </div>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">商品名</label>
        <div class="col-sm-10">
          {{ $data['contact']['name'] }}
        </div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">価格</label>
        <div class="col-sm-10">
          {{ $data['contact']['price'] }}
        </div>
      </div>
      <div class="form-group row">
        <label for="quality" class="col-sm-2 col-form-label">商品状態</label>
        <div class="col-sm-10">
          {{ $data['contact']['quality'] }}
        </div>
      </div>
      <div class="form-group row">
      <label for="comment" class="col-sm-2 col-form-label">商品の説明</label>
        <div class="col-sm-10">
        {{ $data['contact']['comment'] }}
        </div>
      </div>
      <div class="row justify-content-around">
        <div style="display:inline-flex">
          <div class="grid text-center" style="width: 400px; margin: auto;">
            <button type="button" class='btn btn-primary w-25 mt-3' onClick="history.back()">戻る</button>
            <button type='submit' class='btn btn-primary w-25 mt-3'>更新する</button>
          </div> 
        </div> 
    </form>
</div>

@endsection