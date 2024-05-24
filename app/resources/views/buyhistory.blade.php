@extends('layouts.app')

@section('content')
<h1 class="text-center">購入履歴</h1>
<div class="container text-center">
  <div class="row">
    @foreach($purchase as $purchase)
    <div class="col-sm-4 col-12 col-md-6 col-lg-4">
      <div class="card">
          <img src="{{ asset('public/image/' . $purchase->sale['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="250">
          <div class="card-body">
            <h5 class="card-title">{{ $purchase->sale['price'] }}円</h5>
            <a href="{{ route('detail', ['id' => $purchase->sale['id']]) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection