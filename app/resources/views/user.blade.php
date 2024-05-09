@extends('layouts.app')

@section('content')

<div class="container text-center">
  <div class="row justify-content-center">
    <div class="col-4">
      <img src="{{ asset('storage/images/' . $user['image']) }}" class="img-thumbnail" alt="ユーザー画像" value="{{ $user['image'] }}" >
    </div>
    <div class="col-4">
      <p class="h5">{{ $user['name'] }}</p>
      <p class="h6">{{ $user['profile'] }}</p>
      
    </div>
  </div>
</div>
<form action="{{ route('follow', ['id' => $user['id']]) }}" method="get" enctype="multipart/form-data"> 
  <div class='row justify-content-center'>
    <button type='submit' class='btn btn-primary w-25 mt-3'>フォローする</button>
  </div>
</form>

<hr class="border border-dark border-3 opacity-75">
<div class="container">
  <div class="container text-center">
    <div class="d-flex justify-content-center">
      
      <div class="card" style="width:30rem;height:35rem">
          <img src="" class="card-img-top" alt="sale_picture" width="auto" height="400">
          <div class="card-body">
            <h5 class="card-title">{{ $sale['price'] }}円</h5>
            <a href="{{ route('detail', ['id' => $sale['id']]) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
      
    </div>
  </div>
</div>

@endsection