@extends('layouts.app')

@section('content')

<div class="card-body">
    <form action="{{ route('check', $result['id']) }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <label for="name" class="col-sm-2 col-form-label">商品画像<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
        <div class="form-group row">
          <img src="{{ asset('public/image/' . $result->picture) }}" enctype="multipart/form-data" class="rounded mx-auto d-block" width="400" height="400">
          <input type="file" name="picture" value="{{ $result->picture }}"/>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">商品名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
          <div class="col-sm-10">
            <input type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ $result->name }}">
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
            <input type="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" value="{{ $result->price }}">
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
              <option selected>{{ $result->quality }}</option>
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
            <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" rows="3" value="{{ $result->comment }}">{{ $result->comment }}</textarea>
            @if ($errors->has('comment'))
              <span class="invalid-feedback" role="alert">
                {{ $errors->first('comment') }}
              </span>
            @endif
          </div>
        </div>
        <div class='row justify-content-center'>
          <button type='submit' class='btn btn-primary w-25 mt-3'>確認</button>
        </div> 
    </form>
</div>
@endsection

