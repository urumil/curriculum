@extends('layouts.app')

@section('content')

<h1 class="text-center">フォロー一覧</h1>
@foreach($follow as $follow)
<div class="container text-center">
  <form action="" method="get" enctype="multipart/form-data"> 
    <div class="card-body">
      <div class="row">
        <img src="{{ asset('public/image/' . $follow->user['image']) }}" class="img-thumbnail" alt="ユーザー画像">
        <a class="nav-link" href="{{ route('user', ['id' => $follow->user['id']]) }}">{{ $follow->user->name }}</a>
        <button type='submit' class='btn btn-primary'>フォローを外す</button>
      </div>
    </div>
  </form>
</div>
@endforeach

@endsection