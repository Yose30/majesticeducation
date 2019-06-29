<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Majestic Education</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

            p {
                font-size: 50px;
                font-weight: 600;
                font-style: bold;
                color:#7d4f9d;
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
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>

