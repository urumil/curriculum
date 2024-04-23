@extends('layouts.app')

@section('content')

<h1 class="text-center">フォロー一覧</h1>
@foreach($follow as $follows)
<div class="container">
  <div class="container text-center">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    @foreach($user as $users)
      <img src="{{ $users['profile'] }}" class="img-thumbnail" alt="ユーザー画像">
      <a class="nav-link" href="{{ route('user', ['id' => $follows['id']]) }}">{{ $users['name'] }}</a>
    @endforeach 
    </div>
    <form action="" method="get" enctype="multipart/form-data"> 
      <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>フォローを外す</button>
      </div> 
    </form>
  </div>
</div>
@endforeach  

@endsection