@extends('layouts.admapp')

@section('content')

@can('admin')
<h1 class="text-center">ユーザーリスト</h1>
@foreach($user as $users)
<div class="container text-center">
  <form action="" method="get" enctype="multipart/form-data"> 
    <div class="card-body">
      <div class="row">
        <img src="{{ asset('public/image/' . $users['image']) }}" class="img-thumbnail" alt="ユーザー画像">
        <a class="nav-link" href="{{ route('admuser', ['id' => $users['id']]) }}">{{ $users['name'] }}</a>
        <a href="{{ route('admuser', ['id' => $users['id']]) }}" class="btn btn-primary">詳細</a>
      </div>
    </div>
  </form>
</div>
@endforeach

<hr class="border border-dark border-3 opacity-75">
<h1 class="text-center">利用停止中ユーザーリスト</h1>
@foreach($user_delete as $delete)
<div class="container text-center">
  <form action="" method="get" enctype="multipart/form-data"> 
    <div class="card-body">
      <div class="row">
        <img src="{{ asset('public/image/' . $delete['image']) }}"class="img-thumbnail" alt="ユーザー画像">
        <a class="nav-link" href="{{ route('admuser', ['id' => $delete['id']]) }}">{{ $delete['name'] }}</a>
        <a href="{{ route('restore_user', ['id' => $delete['id']]) }}" class="btn btn-primary">利用停止を解除する</a>
      </div>
    </div>
  </form>
</div>
@endforeach

@endcan

@endsection
