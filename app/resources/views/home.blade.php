@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('search') }}" method="get">
        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワードを入力">
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('search') }}" >クリア</a>
        </button>
    </form>
</div>
<br>
<div class="container">
   <div class="container text-center">
        <div class="justify-content-center">
            @foreach($sale as $sales)
                <div class="card" style="width:40;height:50rem">
                    <img src="{{ asset('public/image/' . $sales['picture']) }}" class="card-img-top" alt="sales_picture" width="auto" height="650">
                    <div class="card-body">
                        <h2 class="card-title">{{ $sales['price'] }}円</h5>
                        <a href="{{ route('detail', ['id' => $sales['id']]) }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
