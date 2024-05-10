@extends('layouts.admapp')

@section('content')

@can('admin')
<div class="container text-center">
  <div class="row justify-content-center">
    <div class="col-4">
      <img src="{{ asset('storage/images/' . $user->image) }}" class="img-thumbnail" alt="ユーザー画像" value="{{ $user->image }}" >
    </div>
    <div class="col-4">
      <p class="h5">{{ $user->name }}</p>
      <p class="h6">{{ $user->profile }}</p>
    </div>
  </div>
</div>
<form action="" method="get" enctype="multipart/form-data"> 
  <div class='row justify-content-center'>
    <button type='submit' class='btn btn-primary w-25 mt-3'>利用停止</button>
  </div>
</form>

<hr class="border border-dark border-3 opacity-75">
<div class="container">
  <div class="container text-center">
    <h1 class="text-center">表示中の商品</h1>
    <div class="d-flex justify-content-center">
      @forelse($sale as $sales)
      <div class="card" style="width:30rem;height:35rem">
        <img src="{{ asset('public/image/' . $sales['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="400">
        <div class="card-body">
          <h5 class="card-title">{{ $sales['price'] }}円</h5>
          <a href="{{ route('admsale', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
        </div>
      </div>
      @empty
      <div class="card" style="width:30rem;height:35rem"></div>
      @endforelse
    </div>
    <br>
    <hr class="border border-dark border-3 opacity-75">
    <h1 class="text-center">非表示の商品</h1>
    <div class="d-flex justify-content-center">
      @forelse($delete as $delete)
      <div class="card" style="width:30rem;height:35rem">
        <img src="{{ asset('public/image/' . $delete['picture']) }}" class="card-img-top" alt="delete_picture" width="auto" height="400">
        <div class="card-body">
          <h5 class="card-title">{{ $delete['price'] }}円</h5>
          <a href="{{ route('restore', ['id' => $delete['id']]) }}">
            <button class='btn btn-primary'>商品を再表示にする</button>
          </a>
        </div>
      </div>
      @empty
      <div class="card" style="width:30rem;height:35rem"></div>
      @endforelse
    </div>
  </div>
</div>


@endcan

@endsection