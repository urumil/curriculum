@extends('layouts.app')

@section('content')

<h1 class="text-center">売上履歴</h1>
<table class="table">
  <thead>
    <tr>
      <th>【商品名】</th>
      <th>【価格】</th>
      <th>【売上日時】</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($sell as $sell)
    <tr>
      <td>{{ $sell->good }}</td>
      <td>
        <span class="label">{{ $sell->sale->price }}円</span>
      </td>
      <td>{{ $sell->created_at }}</td>
      <td><a href="{{ route('detail', ['id' => $sell->sale['id']]) }}">詳細</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection