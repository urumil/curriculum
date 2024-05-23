@extends('layouts.admapp')

@section('content')

@can('admin')
<h1 class="text-center">ユーザーリスト</h1>
@foreach($user as $users)
<div class="container text-center">
  <div class="row ">
    <div class="card-body">
      <table>
        <tr>
          <td><img src="{{ asset('public/image/' . $users['image']) }}" class="rounded-circle" alt="ユーザー画像" width="100" height="100"></td>
          <td><a class="nav-link " href="{{ route('admuser', ['id' => $users['id']]) }}">{{ $users['name'] }}</a></td>
          <td><a href="{{ route('admuser', ['id' => $users['id']]) }}" class="btn btn-primary">詳細</a></td>
        </tr>
      </table>
    </div>
  </div>
</div>
@endforeach

<hr class="border border-dark border-3 opacity-75">
<h1 class="text-center">利用停止中ユーザーリスト</h1>
@foreach($user_delete as $delete)
<div class="container">
  <div class="card-body">
    <table>
      <tr>
        <td><img src="{{ asset('public/image/' . $delete['image']) }}" class="rounded-circle" alt="ユーザー画像" width="100" height="100"></td>
        <td><a class="nav-link" href="{{ route('admuser', ['id' => $delete['id']]) }}">{{ $delete['name'] }}</a></td>
        <td><a href="{{ route('restore_user', ['id' => $delete['id']]) }}" class="btn btn-primary">利用停止を解除する</a></td>
      </tr>
    </table>
  </div>
</div>
@endforeach


@endcan

@endsection
