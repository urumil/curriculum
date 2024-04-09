@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($sale as $sales)
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="sales_picture">
                    <div class="card-body">
                        <h5 class="card-title">{{ $sales['price'] }}円</h5>
                        <a href="{{ route('sale.detail', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
