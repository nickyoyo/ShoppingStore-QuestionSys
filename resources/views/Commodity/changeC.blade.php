@extends('layouts.layout')

@section('content')
<div class="store-show">
    <h1>Show for <h1>
    @foreach($test as $test)
   <form action="{{ route('changeC', $test->id) }}" method="get" enctype="multipart/form-data">
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
           <input type="file" id="image" name="image" value="{{$test->image_path}}">  </p>
     <label for="type">Commodity Description:</label>
           <input type="text" id="description" name="description" value="{{$test->description}}">  </p>
     
   <input type="submit" value="Send">
   
   </form>
   @endforeach
   <a href="/" class="back" style="color:black;font-size:10px;">Back</a>
</div>


@endsection
