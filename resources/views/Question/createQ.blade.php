@extends('layouts.layout')

@section('content')
<div class="store-show">
    <h1>Show for <h1>
   <form action="{{ route('sendQ') }}" method="get" enctype="multipart/form-data">
   @csrf
     <label for="name">Question Topic:</label>
          <input type="text" id="topic" name="topic"></p>
     <label for="type">Question Type:</label>
          <select name="type" id="type">
               <option value="A">A</option>
               <option value="B">B</option>
               <option value="C">C</option>
          </select></p>
     <label for="price">Question users_level:</label>
          <input type="number" id="users_level" name="users_level"></p>
     <label for="type">Question Description:</label>
           <input type="text" id="description" name="description">  </p>
     
   <input type="submit" value="Send">
     
   </form>
   <a href="/" class="back" style="color:black;font-size:10px;">Back</a>
   @for($i=0 ; $i<2 ; $i++)
         <br>
   @endfor
</div>

     
@endsection
