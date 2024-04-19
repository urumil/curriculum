@extends('layouts.app')

@section('content')
<h1 class="text-center">出品商品登録</h1>
<div class="card-body">
    <form action="{{ route('create') }}" method="post"> 
        @csrf
        <div>商品画像</div>
        <span class="item-image-form image-picker">
          <input type="file" name="item-image" class="d-none" accept="image/png,image/jpeg,image/gif" id="item-image" value="{{ old('image') }}"/>
          <label for="item-image" class="d-inline-block" role="button">
              <img src="" style="object-fit: cover; width: 300px; height: 300px;">
          </label>
          
</span>
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">商品名</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="inputEmail3" placeholder="例：イヤリング" value="{{ old('name') }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="price" class="col-sm-2 col-form-label">価格</label>
          <div class="col-sm-10">
            <input type="price" class="form-control" id="inputEmail3" placeholder="円" value="{{ old('price') }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="quality" class="col-sm-2 col-form-label">商品状態</label>
          <div class="col-sm-10">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" value="{{ old('quality') }}">
              <option selected>商品状態を選択</option>
              <option value="1">未使用</option>
              <option value="2">目立った傷や汚れなし</option>
              <option value="3">傷や汚れあり</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
        <label for="comment" class="col-sm-2 col-form-label">商品の説明</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="例：2023年秋ごろ購入し使用済み。" value="{{ old('comment') }}"></textarea>
          </div>
        </div>
        <div class='row justify-content-center'>
          <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
        </div> 
    </form>
</div>
@endsection