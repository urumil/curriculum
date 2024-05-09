@extends('layouts.admapp')

@section('content')

<h1 class="text-center">ユーザーリスト</h1>
@foreach($user as $users)
<div class="container text-center">
  <form action="" method="get" enctype="multipart/form-data"> 
    <div class="card-body">
      <div class="row">
        <img src="{{ $users['image'] }}" class="img-thumbnail" alt="ユーザー画像">
        <a class="nav-link" href="">{{ $users['name'] }}</a>
        <button type='submit' class='btn btn-primary'>利用停止</button>
      </div>
    </div>
  </form>
</div>
@endforeach

@endsection
