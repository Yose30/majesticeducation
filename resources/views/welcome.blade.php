<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        

        <!-- Styles -->
        <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
            html, body {
                background-image:url({{ asset('img/avionbarco.png')}});               
                 background-repeat: no-repeat;
                 background-size: auto auto;
                 background-position: right;
                 background-color:#FFFFFF;             
                font-family: 'Open Sans', sans-serif;
                font-weight: 200;
                color: #636b6f;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight: 600;
                font-style:bold;
                color:#a9343A;
            }

            
            .links > a {
                color: #636b6f;
                padding: 0 25px;
               
                text-decoration: none;
                margin-top: 10px;
                margin-bottom: 10px;
                margin-right: 10px;
                margin-left: 10px;
            }
           
            #logeo{
                
                color:#9E1F63;
                font-size: 15px;
                font-weight: 600;
                font-style:bold,
                 /*
                color:#000;
                border: 1px solid #d91c5c;
                border-radius:10px;
                padding: 10px;
                background-color:#d91c5c;
            */
            }
            #logeo:hover{
                color:#FF5A00;
            }
            #logeo:active{
                color:#A841A6;

            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else

                   
                        <a href="{{ route('login') }}"> <i class="fa fa-unlock-alt" id="logeo" > {{ __("Iniciar sesión") }}</i></a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Material ME
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs"></a>
                    <a href="https://laracasts.com"></a>
                    <a href="https://laravel-news.com"></a>
                    <a href="https://blog.laravel.com"></a>
                    <a href="https://nova.laravel.com"></a>
                    <a href="https://forge.laravel.com"></a>
                    <a href="https://github.com/laravel/laravel"></a>
                </div>
            </div>
        </div>
    </body>
</html>

