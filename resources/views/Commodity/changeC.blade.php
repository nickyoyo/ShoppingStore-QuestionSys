@extends('layouts.layout')

@section('content')
<div class="store-show">
    <h1>Show for <h1>
    @foreach($test as $test)
   <form action="{{ route('changeC') }}" method="POST" enctype="multipart/form-data">
   @csrf
     <label for="name">Commodity Name:</label>
          <input type="text" id="name" name="name" value="{{$test->name}}"></p>
          
     <label for="type">Commodity Type:</label>
          <select name="type" id="type">
             <option value="{{$test->type}}">{{$test->type}}</option>
               <option value="Book">Book</option>
               <option value="Medicine">Medicine</option>
               <option value="Camp">Camp</option>
          </select></p>

     <label for="price">Commodity Price:</label>
          <input type="number" id="price" name="price" value="{{$test->price}}"></p>

     <label for="type">Commodity Productnumber:</label>
           <input type="text" id="productnum" name="productnum" value="{{$test->productnum}}"></p>

     <label for="type">Commodity Image:</label>
          <img src="{{ URL::asset('storage/'.$test->image_path) }}" width="80" height="60"> 
           <a style="font-size:10px;">欲修改圖片，請至個人商品列點選修改圖片</a></p>

     <label for="type">Commodity Description:</label>
           <input type="text" id="description" name="description" value="{{$test->description}}">  </p>
           
           <input type="text" id="account" name="account" value="{{Auth::user()->email}}" hidden>
           <input type="text" id="id" name="id" value="{{$test->id}}" hidden>

   <input type="submit" value="Send">
   
   </form>
   @endforeach
   <input type ="button" onclick="history.back()" value="Back"></input>
   <a href="/" class="back" style="color:black;font-size:10px;">回首頁</a>
</div>


@endsection
