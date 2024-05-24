@extends('layouts.app')

@section('content')


<div>
    <form action="/" method="get">
    @csrf
        <div class="row justify-content-around">
            <div class="col-md-4">
                <div class="row justify-content-around">
                    <div class="grid text-center" style="width: 400px; margin: auto;">
                        <input type="text" name="keyword" style="width:245px;" value="{{ $keyword }}" placeholder="キーワードを入力">
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="grid text-center" style="width: 400px; margin: auto;">
                        <input type="number" style="width:110px;" name="top" value="{{ $top }}" placeholder="価格">
                            <span class="mx-1">~</span>
                        <input type="number" style="width:110px;" name="down" value="{{ $down }}" placeholder="価格"> 
                    </div>
                    <br>
                    <div class="grid text-center" style="width: 400px; margin: auto;">
                        <button type="submit">検索</button>
                        <button>
                            <a href="/" >クリア</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<br>
<div class="container text-center">
    <div class="row">
    @foreach($sale as $sales)
        <div class="col-sm-4 col-12 col-md-6 col-lg-4">
            <div class="card">
                <img src="{{ asset('public/image/' . $sales['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="250">
                <div class="card-body">
                    <h2 class="card-title">{{ $sales['price'] }}円</h5>
                    <a href="{{ route('detail', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>




@endsection
