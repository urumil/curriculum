@extends('layouts.app')

@section('content')
<div class="card-body">
  <form action="{{ route('edit', $result['id']) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <img src="{{ asset('public/image/' . $result['image']) }}" id="img" class="rounded mx-auto d-block" width="210" height="210" alt="...">
      <input type="file"  name="image" value="{{ $result['image'] }}"/>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label" >ユーザー名</label>
      <input type="name" class="form-control" id="exampleFormControlInput1" name="name" value="{{ $result['name'] }}">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">自己紹介</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="profile">{{ $result['profile'] }}</textarea>
    </div>
    <div class='row justify-content-center'>
      <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
    </div> 
  </form>
</div>


@endsection