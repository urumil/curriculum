@extends('layouts.app')

@section('content')

<h1 class="text-center">フォロー一覧</h1>
<div class="container text-center">
  <div class="row">
    @foreach($follow as $follow)
      <div class="col-sm-4 col-12 col-md-6 col-lg-4">
        <div class="card-body">
          <img src="{{ asset('public/image/' . $follow->user['image']) }}" class="rounded-circle" alt="ユーザー画像" width="100" height="100">
          <a class="nav-link" href="{{ route('user', ['id' => $follow->user['id']]) }}">{{ $follow->user->name }}</a>
          <a href="{{ route('delete_follow', ['id' => $follow['id']]) }}" class="btn btn-primary">フォローを外す</a>
        </div>
      </div>
    @endforeach
  </div>
</div>



@endsection