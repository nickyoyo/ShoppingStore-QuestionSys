@extends('layouts.master')

@section('content')
<div class="store-show">
<form action="/Commodity/personal" method="GET" enctype="multipart/form-data">
@csrf
     <label for="name">搜尋:</label>
          <input type="text" id="name" name="name" placeholder="請輸入想搜尋的產品名稱">&nbsp;
          <input type="account" id="account" name="account" value="{{Auth::user()->email}}" hidden>
   <input type="submit" value="Send">
   
</form> 
    <form action="/Commodity" method="GET" enctype="multipart/form-data">
        <button>顯示全部商品</button>
    </form> 
    <form action="/Commodity/personal/{{Auth::user()->email}}" method="GET" enctype="multipart/form-data">
        <button>顯示個人商品</button>
    </form><p><p>
@php $check=0; @endphp

@isset($test)

@if(count($test)>0)
    <table class="tableborder">
    <tr>
        <th class="bordertopic">功能</th>
        <th class="bordertopic">商品名稱</th>
        <th class="bordertopic">價格</th>
        <th class="bordertopic">剩餘數量</th>
        <th class="bordertopic">描述</th>
        <th class="bordertopic">樣品</th>
        
    </tr>
    @foreach($test as $test1)
    <tr>
        <td class="textw5 text-a-left">  
        <form action="{{ route('delC', $test1->id) }}" method="POST">
        <input type="text" id="old_image" name="old_image" value="{{$test1->image_path}}" hidden></p>
        <input type="account" id="account" name="account" value="{{Auth::user()->email}}" hidden>
        @csrf
        @method('Delete')
        <button>Delete</button>
        </form><p>
        <form action="{{ route('showC', $test1->id) }}" method="POST">
        @csrf
        <button>Modify</button> 
        </form><p>
        <form action="{{ route('changeImage', $test1->id) }}" method="POST">
        @csrf
        <button>ImageChange</button> 
        </form>
    
    <td class="textw5 text-a-center">{{$test1->name}}&nbsp; 
    <td class="textw5 text-a-center">{{$test1->price}}&nbsp;
    <td class="textw5 text-a-center">{{$test1->productnum}}&nbsp;
    <td class="textw30 text-a-left">&nbsp;{{$test1->description}}<br>
    <td class="textw20 text-a-left">&nbsp;<img src=""><img src="{{ URL::asset('storage/'.$test1->image_path) }}"/><br>
    </tr>
    @endforeach
</table>
@endif 
@endisset
    
    
@if(count($test)==0)
    <h1>NO DATA<h1>
@endif
</div>
<input type ="button" onclick="history.back()" value="Back"></input>
   <a href="/" class="back" style="color:black;font-size:10px;">回首頁</a>
@endsection
