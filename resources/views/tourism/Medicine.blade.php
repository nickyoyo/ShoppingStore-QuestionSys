@extends('layouts.layout')

@section('content')
    <body class="antialiased">
      <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="topic">
                    <img src="/img/Topic.JPG" width="600" height="400" alt="test">            
               </div>
               <div class="topictype" >
                    <a href="/Medicine" class="back"  style="color:black">Medicine</a>
                    @for($i=0 ; $i<10 ; $i++)
                        &nbsp;
                    @endfor
                    <a href="/Camp" class="back"  style="color:black">Camp</a>
                    @for($i=0 ; $i<10 ; $i++)
                        &nbsp;
                    @endfor
                    <a href="/Book" class="back"  style="color:black">Book</a>
               </div>
             
               </div>
        </bodu>
@endsection
