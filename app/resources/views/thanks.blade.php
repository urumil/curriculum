@extends('layouts.app')

@section('content')

<h1 class="text-center">ご購入ありがとうございます</h1>
<h5 class="text-center">商品発送まで今しばらくお待ちくださいませ。</h1>
<div class='row justify-content-center'>
  <button type="button" class='btn btn-primary' onclick="location.href='{{ route('mypage', ['id' => Auth::user()->id]) }}' ">マイページへ</button>
</div>

@endsection