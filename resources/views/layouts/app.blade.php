<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laratter') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body style="padding-top: 4.5rem;">
    <div id="app" class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">Laratter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <form action="/messages">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control" placeholder="Buscar" required>
                                <span class="input-group-append"> 
                                    <button class="btn btn-outline-success">Buscar</button>
                                </span>
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav ml-auto">
                    
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                    @else
                        <li class="nav-item dropdown mr-2">
                            <a href="#" class="dropdown" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                            </a>
                            <notifications :user="{{Auth::user()->id}}"> </notifications>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main role="main" class="container mt-6">
                

                @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{mix('js/app.js')}} "></script>
</body>
</html>
