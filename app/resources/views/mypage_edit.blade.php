@extends('layouts.app')

@section('content')
<div class="card-body">
    <form method="POST" action="{{ route('mypage') }}">
        @csrf
        <div class="mb-3">
          <img src="../../../image/freemarket.png" id="img" class="rounded mx-auto d-block" width="210" height="210" alt="...">
          <input id="profile_image" type="file"  name="image" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" >ユーザー名</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">自己紹介</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class='row justify-content-center'>
          <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
        </div> 
    </form>
</div>
@endsection