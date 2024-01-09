<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ElorChat') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>

    </style>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="logo-container">
                <a href="{{ url('/home') }}">
                    <img src="{{ asset('images/logo_elorrieta.png') }}" alt="Logo de la página" class="logo_elorrieta">
                </a>
            </div>
        <div class="container">
        
                <a class="navbar-brand" href="/admin">Panel de Administración</a>

                <!-- <a class="navbar-brand" href="{{ url('/admin') }}">{{ config('app.name', 'Laravel') }}
                </a> -->



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Inicio de sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>        
            <div class="menu">
    <button class="btn dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="true">
        <img src="{{ asset('images/settings_icon.png') }}" alt="Logo del menu de configuracion" class="logo_settings">
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li class="dropdown-item dropdown-toggle dropdown-start">
            <a href="#" class="submenu-toggle">Idioma</a>
            <ul class="dropdown-menu dropdown-submenu">
                <li class="dropdown-item">Euskera</li>
                <li class="dropdown-item">Ingles</li>
            </ul>
        </li>
        <li><a class="dropdown-item" href="#">Tema</a></li>
        @auth
        <li><a class="dropdown-item" href="#">Cambiar de contraseña</a></li>
        @endauth
    </ul>
</div>
 
        </div>
        </nav>
        <main class="">
            <div class="row">
            @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('js/script_menu.js') }}"></script>
</body>
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">© 2023 Elorrieta-Errekamari</p>

    <a href="https://www.elorrieta.eus/"><img src="{{ asset('images/title_elorrieta.png') }}" alt="Titulo de la empresa" class="title_elorrieta"></a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Opcion 1</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Opcion 2</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Opcion 3</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Opcion 4</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Opcion 5</a></li>
    </ul>
  </footer>
</div>
</html>
