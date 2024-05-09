@extends('layouts.app')

@section('content')

@can('general')
<div>
    <form action="/" method="get">
    @csrf
        <div class="row justify-content-around">
            <div class="col-md-4">
                <div class="card">
                    <input type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワードを入力">
                </div>
                <table class='table'>
                    <select name="pricelist" value="{{ $pricelist }}" class="form-control">
                        <option value="">未選択</option>
                        <option value="{{ $pricelist }}" name="pricelist">0〜999</option>
                        <option value="">1,000〜4,999</option>
                        <option value="">5,000〜9,999</option>
                        <option value="">10,000〜</option>
                </table>
                <button type="submit">検索</button>
                <button>
                    <a href="/" >クリア</a>
                </button>
            </div>
        </div>
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
@endcan

@endsection
