@extends('layouts.layout')

@section('content')
<div class="store-show">
    <h1>Show for <h1>
   <form action="{{ route('senddata') }}" method="POST" enctype="multipart/form-data">
   @csrf
     <label for="name">Commodity Name:</label>
          <input type="text" id="name" name="name"></p>
     <label for="type">Commodity Type:</label>
          <select name="type" id="type">
               <option value="Book">Book</option>
               <option value="Medicine">Medicine</option>
               <option value="Camp">Camp</option>
          </select></p>
    @isset(Auth::user()->email)
    <input type="account" id="account" name="account" value="{{Auth::user()->email}}" hidden></p>
    @endisset
     <label for="price">Commodity Price:</label>
          <input type="number" id="price" name="price"></p>
     <label for="type">Commodity Productnumber:</label>
           <input type="text" id="productnum" name="productnum"></p>
     <label for="type">Commodity Image:</label>
           <input type="file" id="image" name="image">  </p>
     <label for="type">Commodity Description:</label>
           <input type="text" id="description" name="description">  </p>
     
   <input type="submit" value="Send">
   
   </form>
   <input type ="button" onclick="history.back()" value="Back"></input>
   <a href="/" class="back" style="color:black;font-size:10px;">回首頁</a>
</div>


@endsection
