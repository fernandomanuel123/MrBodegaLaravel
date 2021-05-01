<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ __('Mi Bodega') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Mi Bodega') }}


                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="dropdown">
                            <button class="btn" type="button" id="dropdownUsuarioButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                Usuarios
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownUsuarioButton">
                                <a class="dropdown-item" href="adm-usuario">Listar Usuario</a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn" type="button" id="dropdownProductoButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                Productos
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownProductoButton">
                                <a class="dropdown-item" id="btn-listarproductos" href="productos">Listar Productos </a>
                                <button class="btn dropdown-item" type="button" id="dropdownSubMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    Categorias
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownSubMenuButton">
                                    <a class="dropdown-item" href="#">Whisky</a>
                                    <a class="dropdown-item" href="#">Ron</a>
                                    <a class="dropdown-item" href="#"> Cerveza</a>
                                    <a class="dropdown-item" href="#">Vino</a>
                                    <a class="dropdown-item" href="#">Vodka</a>
                                    <a class="dropdown-item" href="#">Tequila</a>
                                    <a class="dropdown-item" href="#">Piqueos</a>
                                    <a class="dropdown-item" href="#">Otros</a>
                                </div>
                            </div>
                        </div>


                        <div class="dropdown">
                            <button class="btn " type="button" id="dropdownBoletasButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                Boletas
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownBoletasButton">
                                <a id = "btn-listarboletas" class="dropdown-item" href="boletas">Listar Boletas</a>
                                <a class="dropdown-item" href="#">Registrar Boleta</a>
                            </div>
                        </div>

                            <a class="btn" href="metrics">Estadistica</a>


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Cerrar sesion') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>