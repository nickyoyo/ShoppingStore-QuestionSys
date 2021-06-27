
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Store</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
         
            .topic{
                position: relative;
                margin-top:10px;
                margin-left:350px;
            }
            .topicwel{
                position: relative;
                margin-left:470px;
                margin-top:20px;
                color:#000000;
            }
            .topictype{
                position: relative;
                margin-left:470px;
                margin-top:20px;
                border:1px solid black;
                color:#000000;
            }
            .Topicword{
                    padding:0px 10px;
                    color:#555;
                    background-color:#fff;
                    font-size:20px;
                    font-weight:solid;
            }
            .login{
                position: relative;
                color:#000000;
            }
            .tableborder{
                width:100%;
                border:1px solid black;
                border-collapse:collapse;
            }
            .textw3 {
                    width:3%;
                    padding:10px 0px;
                    color:#555;
                    background-color:#fff;
                    border:1px solid black;
                    font-size:10px;
                    font-weight:solid;
            }
            .textw5 {
                    width:5%;
                    padding:10px 0px;
                    color:#555;
                    background-color:#fff;
                    border:1px solid black;
                    font-size:10px;
                    font-weight:solid;
            }
            .textw10 {
                    width:10%;
                    padding:10px 0px;
                    color:#555;
                    background-color:#fff;
                    border:1px solid black;
                    font-size:10px;
                    font-weight:solid;
            }
            .textw12 {
                    width:12%;
                    padding:10px 0px;
                    color:#555;
                    background-color:#fff;
                    border:1px solid black;
                    font-size:10px;
                    font-weight:solid;
            }
            .textw20 {
                width:20%;
                padding:10px 0px;
                color:#555;
                background-color:#fff;
                border:1px solid black;
                font-size:10px;
                font-weight:solid;
            }
            .textw30 {
                width:30%;
                padding:10px 0px;
                color:#555;
                background-color:#fff;
                border:1px solid black;
                font-size:10px;
                font-weight:solid;
            }
            .bordertopic{
                font-size:10px;
                font-weight:solid;

                border:1px solid black;
            }
            .text-a-left{
                position: relative;
                text-align:left;
                padding: 5px;
            }
            .text-a-center{
                text-align:center;
            }
            form {
                display: inline;
            }
            .buttonback {
                width:90px;
                height:25px;
            }
            .countdata{
                color:#555;
                font-weight:solid;
                font-size:20px;
            }
            footer {
                background: #444444;
                height: 15px;
                font-family: 'Open Sans', sans-serif;
                color: black;
            }
        </style>
@livewireStyles
<link href="/css/main.css" rel="stylesheet">
</head>
<body>



                    <ul>
                        <a style="color:black" href="/">首頁</a>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <a class="login">
                                    <a style="color:black" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </a>
                            @endif
                        &nbsp;
                            @if (Route::has('register'))
                                <a class="login" >
                                    <a style="color:black" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </a>
                            @endif
                        @else
                                <a style="color:black">
                                    {{ Auth::user()->name }}
                                 
                                </a>
                                    <a style="color:black;font-weight:bold; border:1px solid black;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        @endguest
                    </ul>    
                    @livewireScripts
                    @yield('content')   
    <footer style="position: relative;bottom:0%;width:100%;">
          Copyright 2021 Buy&Sell  
    </footer>
</body>
</html>