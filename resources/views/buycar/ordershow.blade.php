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
                        <th>商品</th>
                        <th class="text-center">單價</th>
                        <th class="text-center">數量</th>
                        <th class="text-center">小計</th>
                    </tr>
                    </thead>
                    <tbody>         
                @foreach($items as $item)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{ URL::asset('storage/'.$item->commodity->image_path) }}" style="width: 100px; height: 80px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$item->commodity->name}}</a></h4>
                                </div>
                            </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">{{$item->commodity->price}}</td>
                        <td class="col-sm-1 col-md-1 text-center">{{$item->qty}}</td>

                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->commodity->price*$item->qty}}</strong></td>
                    </tr>
                @endforeach
                </table>
                <table class="table table-borderless">
                
                <td><td><td><td><td><td><td>  

                <form method="POST" action="/orders" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            訂購者姓名
                    </label>
                            <input type="text" id="name" size="10" name="name" value="{{Auth::user()->name}}">
                    <p>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Eamil">
                            訂購者信箱
                    </label>
                    <input type="email" id="email" size="25" name="email" value="{{Auth::user()->email}}">

                    <td><h4>總價</td>
                    <td><h4><strong>{{$total}}</strong></td>
                    <input type="integer" id="tolprice" name="tolprice" value="{{$total}}" hidden>
                    <td>
                    <button type="submit" class="btn btn-success">
                                        送出訂單 <span class="fa fa-play"></span>
                                        </button></a>  </td>
                </form>

                </table>
                </tbody>
        </div>
    </div>
@endsection