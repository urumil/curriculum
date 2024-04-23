@extends('layouts.app')

@section('content')

@foreach($user as $users)
<div class="container text-center">
  <div class="row justify-content-center">
    <div class="col-4">
      <img src="{{ asset('storage/images/' . $users['image']) }}" class="img-thumbnail" alt="ユーザー画像" value="{{ $users['image'] }}" >
    </div>
    <div class="col-4">
      <p class="h5">{{ $users['name'] }}</p>
      <p class="h6">{{ $users['profile'] }}</p>
    </div>
  </div>
</div>
<form action="{{ route('follow', ['id' => $users['id']]) }}" method="get" enctype="multipart/form-data"> 
  <div class='row justify-content-center'>
    <button type='submit' class='btn btn-primary w-25 mt-3'>フォローする</button>
  </div>
</form>
@endforeach 
<hr class="border border-dark border-3 opacity-75">
<div class="container">
  <div class="container text-center">
    <div class="d-flex justify-content-center">
      @foreach($sale as $sales)
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('public/image/' . $sales['picture']) }}" class="card-img-top" alt="sales_picture" width="210" height="210">
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