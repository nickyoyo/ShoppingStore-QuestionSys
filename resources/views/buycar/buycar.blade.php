@extends('layouts.master')

@section('购物车', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>商品</th>
                    <th class="text-center">單價</th>
                    <th class="text-center">數量</th>
                    <th class="text-center">小計</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="storage/{{$item->commodity->image_path}}" style="width: 100px; height: 80px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$item->commodity->name}}</a></h4>
                                </div>
                            </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">{{$item->commodity->price}}</td>
                        <td class="col-sm-1 col-md-1 text-center">
                                <form action="{{ route('minusbuttom', $item->id) }}" method="POST">
                                                @csrf
                                                <button>-</button>
                                                </form>
                                    {{$item->qty}}
                                <form action="{{ route('addbuttom', $item->id) }}" method="POST">
                                                @csrf
                                                <button>+</button>
                                                </form>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->commodity->price*$item->qty}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <a href="/removeItem/{{$item->id}}"> <button type="button" class="btn btn-danger">
                                    <span class="fa fa-remove"></span> 移除
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>總價</h3></td>
                    <td class="text-right"><h3><strong>${{$total}}</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a href="/Commodity"> <button type="button" class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span> 繼續購買
                            </button>
                        </a></td>
                    <td>
                        <button type="button" class="btn btn-success">
                            總結 <span class="fa fa-play"></span>
                        </button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection