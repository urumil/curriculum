@extends('layouts.app')

@section('content')
<h1 class="text-center">出品商品登録</h1>
<div class="card-body">
    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">商品画像<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
          <div class="form-group row">
            <input type="file" name="picture" value="{{ old('picture') }}"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">商品名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
          <div class="col-sm-10">
            <input type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="例：イヤリング" value="{{ old('name') }}">
            @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                {{ $errors->first('name') }}
              </span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="price" class="col-sm-2 col-form-label">価格<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
          <div class="col-sm-10">
            <input type="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="円" value="{{ old('price') }}">
            @if ($errors->has('price'))
              <span class="invalid-feedback" role="alert">
                {{ $errors->first('price') }}
              </span>
            @endif
          </div>
        </div>
        <div class="form-group row">
        <label for="quality" class="col-sm-2 col-form-label">商品状態<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
          <div class="col-sm-10">
            <select class="custom-select mr-sm-2 @error('quality') is-invalid @enderror" name="quality">
              <option value="">商品状態を選択</option>
              <option value="未使用" @if( old('quality') === '未使用' ) selected @endif>未使用</option>
              <option value="目立った傷や汚れなし" @if( old('quality') === '目立った傷や汚れなし' ) selected @endif>目立った傷や汚れなし</option>
              <option value="傷や汚れあり" @if( old('quality') === '傷や汚れあり' ) selected @endif>傷や汚れあり</option>
            </select>
            @if ($errors->has('quality'))
              <span class="invalid-feedback" role="alert">
                {{ $errors->first('quality') }}
              </span>
            @endif
          </div>
        </div>
        <div class="form-group row">
        <label for="comment" class="col-sm-2 col-form-label">商品の説明<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
          <div class="col-sm-10">
            <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" rows="3" placeholder="例：2023年秋ごろ購入し使用済み。" value="{{ old('comment') }}">{{ old('comment') }}</textarea>
            @if ($errors->has('comment'))
              <span class="invalid-feedback" role="alert">
                {{ $errors->first('comment') }}
              </span>
            @endif
          </div>
        </div>
        <div class='row justify-content-center'>
          <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
        </div> 
    </form>
</div>
@endsection
