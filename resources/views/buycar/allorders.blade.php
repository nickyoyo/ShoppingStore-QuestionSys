@extends('layouts.master')

@section('sidebar')
    @parent
@endsection

@section('content')

       <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-2">
            <h2>訂單頁面<h2>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                <table class="table table-bordered">
                    <thead>
                    <tr> 
                        <th class="px-4 py-2">Order Number</th>
                        <th class="px-4 py-2">User Info</th>
                        <th class="px-4 py-2">Total Price</th>
                        <th class="px-4 py-2">Show Details</th>
                        <th class="px-4 py-2">paid</th>
                    </tr>
                    </thead>
                    <tbody>         
                    @foreach($orders as $order)
                <tr>
                    <td class="border px-4 py-2">{{$order->id}}</td>
                    <td class="border px-4 py-2">{{$order->name}}</td>
                    <td class="border px-4 py-2">{{$order->tolprice}}</td>
                    <td class="border px-4 py-2">
                    <form method="POST" action="/orderdetail" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                         @csrf
                            <input type="integer" id="cartid" name="cartid" value="{{unserialize($order->cart)['id']}}" hidden>
                    <button>Show</button></td>
                    </form>
                    <td class="border px-4 py-2">
                        @if( $order->paid ==0)
                            未繳費
                        @else
                            已繳費
                        @endif
                    </td>
                </tr>
                @endforeach
                </table>
                </tbody>
        </div>
    </div>
@endsection