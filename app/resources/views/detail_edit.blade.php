@extends('layouts.app')

@section('content')

<div class="card-body">
    <form action="{{ route('check', $result['id']) }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <div>商品画像</div>
        <div class="form-group row">
          <img src="{{ asset('public/image/' . $result->picture) }}" enctype="multipart/form-data" class="rounded mx-auto d-block" width="400" height="400">
          <input type="file" name="picture" value="{{ $result->picture }}"/>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">商品名</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" name="name" value="{{ $result->name }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="price" class="col-sm-2 col-form-label">価格</label>
          <div class="col-sm-10">
            <input type="price" class="form-control" name="price" value="{{ $result->price }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="quality" class="col-sm-2 col-form-label">商品状態</label>
          <div class="col-sm-10">
            <select class="custom-select mr-sm-2" name="quality" value="{{ $result->quality }}">
              <option selected>{{ $result->quality }}</option>
              <option value="">商品状態を選択</option>
              <option value="未使用">未使用</option>
              <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
              <option value="傷や汚れあり">傷や汚れあり</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
        <label for="comment" class="col-sm-2 col-form-label">商品の説明</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="comment" rows="3">{{ $result->comment }}</textarea>
          </div>
        </div>
        <div class='row justify-content-center'>
          <button type='submit' class='btn btn-primary w-25 mt-3'>確認</button>
        </div> 
    </form>
</div>

@endsection