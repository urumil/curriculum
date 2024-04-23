@extends('layouts.app')

@section('content')
<h1>いいね商品一覧</h1>
<div class="container">
   <div class="container text-center">
        <div class="d-flex justify-content-center">
            @foreach($sale as $sales)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('public/image/' . $sales['picture']) }}" class="card-img-top" alt="sales_picture" width="210" height="210">
                    <div class="card-body">
                        <h5 class="card-title">{{ $sales['price'] }}円</h5>
                        <a href="{{ route('detail', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection