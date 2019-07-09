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
                position: block;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #ffffff;
                text-align: center;
                }
            #btbBuscarM
            {
                background-color:#f2991f;
                color:#000;
                font-weight: bold; 
                border: 1px solid #f2991f;

            }
            #btbBuscarM i {
                font-size: 20px !important
            }
            #btbBuscarM:hover
            {
                background-color:#f7ca39;
                color:#000;
                font-weight: bold; 
            } 

            /* Plataform - Nuevo */
            /* #btnDetalles
            {
                background-color:#f2991f;
                color:#ffffff;
                font-weight: bold; 
                border: 1px solid #f2991f;

            } */
            #btnDetalles i {
                font-size: 20px !important
            }
    </style>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div id="app">
        @include('partials.menu_general')
        <main class="container py-4">
            @if(session('message'))
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="alert alert-{{ session('message')[0] }} alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">
                                <i class="fa fa-exclamation"></i> {{ __("Mensaje") }}
                            </h4>
                            <p>{{ session('message')[1] }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
<footer>
    <hr/>
    <hr/>
    <p><center>Derechos Reservados <b><i>© Majestic Education</i></b>. Aviso de Privacidad.</center></p>
</footer>
</html>
