@extends('layouts.app')

@section('content')
<h1 class="text-center">購入履歴</h1>
<div class="container">
  <div class="container text-center">
    <div class="d-flex justify-content-center">
      @foreach($purchase as $purchase)
      <div class="card" style="width:30rem;height:35rem">
          <img src="{{ asset('public/image/' . $purchase->sale['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="400">
          <div class="card-body">
            <h5 class="card-title">{{ $purchase->sale['price'] }}円</h5>
            <a href="{{ route('detail', ['id' => $purchase->sale['id']]) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection