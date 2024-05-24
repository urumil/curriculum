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
    @foreach($datas['sale'] as $data)
    <tr>
      <td>{{ $data['name'] }}</td>
      <td>
        <span class="label">{{ $data['price'] }}円</span>
      </td>
      <td>{{ $data['purchase'][0]['created_at'] }}</td>
      <td><a href="{{ route('detail', ['id' => $data['id']]) }}">詳細</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection