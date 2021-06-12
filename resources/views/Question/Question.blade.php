@extends('layouts.layout')

@section('content')
<div class="store-show">
<form action="/searchQ" method="GET" enctype="multipart/form-data">
@csrf
     <label for="name">請選擇想搜尋的問題類別:</label>
          <select name="Qtype" id="Qtype">
             @if($Qtype!="A")
               <option>{{$Qtype}}</option> 
             @else
               <option>ALL</option> 
             @endif
               <option value="A">A</option>
               <option value="B">B</option>
               <option value="C">C</option>
          </select>
   <input type="submit" value="Send">
</form>
<form action="/Question" method="GET" enctype="multipart/form-data">
        <button>全部顯示</button>
</form><p>
@php $check=0; @endphp

@isset($test)

@if(count($test)>0)
    
    <table class="tableborder">
    <tr>
    @isset(Auth::user()->users_level)
        <th class="bordertopic">功能</th>
    @endisset
        <th class="bordertopic">問題名稱</th>
        <th class="bordertopic">問題類別</th>
        <th class="bordertopic">問題狀態</th>
        <th class="bordertopic">描述</th>
        

    </tr>
    @foreach($test as $test1)
    <tfoot>
    <tr>
    <td class="textw10 text-a-left">
        @isset(Auth::user()->users_level)
        @if(Auth::user()->users_level == $test1->users_level)    
        <form action="{{ route('delQ', $test1->id) }}" method="POST">
        @csrf
        @method('Delete')
        <button>Delete</button>
        </form>
        &nbsp;&nbsp;
        <form action="{{ route('showQ', $test1->id , Auth::user()->email) }}" method="POST">
        @csrf
        <button>Modify</button>
        @endif
        @endisset
        </form>
        
    <td class="textw30 text-a-left">&nbsp;
    {{$test1->topic}}&nbsp;
    <td class="textw5 text-a-center">{{$test1->type}}&nbsp;
    <td class="textw5 text-a-center">{{$test1->status}}&nbsp;
    <td class="textw30 text-a-left">&nbsp;{{$test1->description}}<br>
    </tr>
    </tfoot>
    @endforeach
</table>

@endif 
@endisset
    
    
@if(count($test)==0)
    <h1>NO DATA<h1>
@endif
</div></p>
<a href="/" class="back" style="color:black">Back</a>
@endsection
