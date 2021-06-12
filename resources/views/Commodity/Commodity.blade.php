@extends('layouts.layout')

@section('content')
<div class="store-show">
<h1>Show for <h1>
<form action="/search" method="GET" enctype="multipart/form-data">
@csrf
     <label for="name">搜尋:</label>
          <input type="text" id="name" name="name" placeholder="請輸入想搜尋的產品名稱">&nbsp;
   <input type="submit" value="Send">
   
</form> 
    <form action="/Commodity" method="GET" enctype="multipart/form-data">
        <button>全部顯示</button>
    </form><p>

@php $check=0; @endphp

@isset($test)

@if(count($test)>0)
    <table class="tableborder">
    <tr>
        <th class="bordertopic">選擇</th>
        <th class="bordertopic">商品名稱</th>
        <th class="bordertopic">價格</th>
        <th class="bordertopic">剩餘數量</th>
        <th class="bordertopic">描述</th>
        <th class="bordertopic">樣品</th>
        
    </tr>
    @foreach($test as $test1)
    <tfoot>
    <tr>
    <td class="textw5 text-a-center"> <button>Buy</button></td>
    <td class="textw30 text-a-left">    
        <form action="{{ route('deldata', $test1->id) }}" method="POST">
        @csrf
        @method('Delete')
        &nbsp;
        <button>Delete</button>
        <form action="" method="POST">
        @csrf
        &nbsp;
        {{$test1->name}}&nbsp;
        
        </form>
      
    <td class="textw5 text-a-center">{{$test1->price}}&nbsp;
    <td class="textw5 text-a-center">{{$test1->productnum}}&nbsp;
    <td class="textw30 text-a-left">&nbsp;{{$test1->description}}<br>
    <td class="textw30 text-a-left">&nbsp;1<br>
    </tr>
    </tfoot>
    @endforeach
</table>
@endif 
@endisset
    
    
@if(count($test)==0)
    <h1>NO DATA<h1>
@endif
</div>
<a href="/" class="back" style="color:black">Back</a>
@endsection
