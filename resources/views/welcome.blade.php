@extends('layouts.layout')

@section('content')
    <body class="antialiased">
      <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      
                <div class="topic">
                    <img src="/img/Topic.JPG" width="600" height="400" alt="test">            
               </div>
               @if(isset(Auth::user()->email))
                <li><a href="/create" class="back"  style="color:black">新增商品</a><br>
                <li><a href="/createQ" class="back"  style="color:black">新增問題回報</a>
               @else
               <br><br>             
               @endif
               <div class="topicwel" >

                    <a href="/Cart" class="back"  style="color:black">TTest car</a> 
                    @for($i=0 ; $i<10 ; $i++)
                        &nbsp;
                    @endfor
                    <a href="/Question" class="back"  style="color:black">問題回報查詢</a>
                    <!-- 查詢特定文章 -->
                    <!-- 所有權限皆可查看所有文章，但非指定權限無法對問題資訊進行修改 -->
                    @for($i=0 ; $i<10 ; $i++)
                        &nbsp;
                    @endfor
                    <a href="/Commodity" class="back"  style="color:black">購物網站</a>
                    <!-- 查詢商品、刪除商品、購買商品 -->
               </div>
             
        </div>
    </body>
@endsection
