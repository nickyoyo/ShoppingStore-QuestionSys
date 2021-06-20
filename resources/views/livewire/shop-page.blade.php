@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h2>商品列表</h2>
            <ul>
                @foreach ($items as $item)
                <li>
                <img src="storage/{{$item->image_path}}" width=50 height=50>
                    {{ $item->name }} (${{ $item->price }})&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"
                        wire:click="addCart({{$item->id}})">Buy</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm">
            @isset($order)
            <h2>訂單明細</h2>
            <ul>
                @foreach ($order->items as $item)
                <li>{{ $item->title }} {{ $item->price }} x {{ $item->pivot->qty }}</li>
                @endforeach
            </ul>
            總計: {{ $order->sum }}
            @endisset
        </div>
    </div>
</div>
@endsection