@extends('layouts.app')

@section('content')

<h1>購入履歴</h1>
<div class="container">
   <div class="container text-center">
        <div class="justify-content-center">
            @foreach($buyhistory as $buyhis)
                <div class="card" style="width:40;height:50rem">
                    <img src="{{ asset('public/image/' . $buyhis['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="650">
                    <div class="card-body">
                        <h2 class="card-title">{{ $buyhis['price'] }}円</h5>
                        <a href="{{ route('detail', ['id' => $buyhis['id']]) }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection