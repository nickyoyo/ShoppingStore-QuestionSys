@extends('layouts.layout')

@section('content')
<div class="store-show">
    <h1>Show for <h1>
   <form action="{{ route('changeImageupload') }}" method="POST" enctype="multipart/form-data">
   @csrf
   @foreach($test as $test)
     <label class="Topicword">原圖 :</label>
           <img src="{{ URL::asset('storage/'.$test->image_path) }}"/><br>
     <label class="Topicword">欲修改 :</label>
           <input type="file" id="image" name="image">  </p>

           <input type="text" id="old_image" name="old_image" value="{{$test->image_path}}" hidden></p>
           <input type="text" id="id" name="id" value="{{$test->id}}" hidden></p>
           <input type="text" id="account" name="account" value="{{$test->account}}" hidden></p>

   <input type="submit" value="Send">
   @endforeach
   </form>
   <input type ="button" onclick="history.back()" value="Back"></input>
   <a href="/" class="back" style="color:black;font-size:10px;">回首頁</a>
</div>


@endsection
