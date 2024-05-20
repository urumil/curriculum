@extends('layouts.app')

@section('content')

<div class="container text-center">
  <div class="row justify-content-center">
    <div class="col-4">
      <img src="{{ asset('public/image/' . $user['image']) }}" class="img-thumbnail" alt="ユーザー画像" value="{{ $user['image'] }}" >
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
      @foreach($sale as $sales)
      <div class="card" style="width:30rem;height:35rem">
          <img src="{{ asset('public/image/' . $sales['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="400">
          <div class="card-body">
            <h5 class="card-title">{{ $sales['price'] }}円</h5>
            <a href="{{ route('detail', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

@endsection