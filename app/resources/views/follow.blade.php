@extends('layouts.app')

@section('content')

<h1 class="text-center">フォロー一覧</h1>
<div class="container">
  <div class="container text-center">
    <div class="card-body">
      <img src="{{ $follow->user->image }}" class="img-thumbnail" alt="ユーザー画像">
      <a class="nav-link" href="{{ route('user', ['id' => $follow['user_id']]) }}">{{ $sale->user->name }}</a>
    </div>
    <form action="" method="get" enctype="multipart/form-data"> 
      <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>フォローを外す</button>
      </div> 
    </form>
  </div>
</div>


@endsection