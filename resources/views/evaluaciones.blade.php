<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Majestic Education</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
   
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
   
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Open Sans', sans-serif;
               
            }
            #logo{
                font-size: 28px;
                font-weight: 600;
                color:#a9343A;

            }
            #logeo{
                font-size: 15px;
                font-weight: 600;
                color:#9E1F63;
            }
            #logeo:hover{
                color:#FF5A00;
            }
            #logeo:active{
                color:#A841A6;

            }

            #logeooff{
                font-size: 15px;
                font-weight: 600;
                color:#FF5A00;
            }
            #logeooff:hover{
                color:#FF5A00;
            }
            #logeooff:active{
                color:#A841A6;

            }
            footer{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #ffffff;
                text-align: center;
                }   
    </style>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @auth
                    <a class="navbar-brand" href="#" id="logo">
                        Evaluaciones
                    </a>
                @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            <a href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fa fa-unlock" id="logeooff"> {{ __('Cerrar sesión') }}</i>
                                
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            <div align="center">
                <h5>Para el correcto funcionamiento, debes descargar los 3 archivos.</h5>
                <hr>
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Archivo</th>
                                <th scope="col">Descargar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Generador de preguntas</td>
                                <td>
                                    <a class="btn btn-success" style="color:white;"><i class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Examen</td>
                                <td><a class="btn btn-success" style="color:white;"><i class="fa fa-download"></i></a></td>
                            </tr>
                            <tr>
                                <td>Graficador</td>
                                <td><a class="btn btn-success" style="color:white;"><i class="fa fa-download"></i></a></td>
                            </tr>
                        <tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
<footer>
    <hr/>
    <hr/>
    <p><center>Derechos Reservados <b><i>© Majestic Education</i></b>. Aviso de Privacidad.</center></p>
</footer>
</html>
