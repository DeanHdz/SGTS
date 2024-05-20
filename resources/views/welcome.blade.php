<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @include('sweetalert::alert')
    </head>
    <body class="bg-light justify-content-center">
        <header class="">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Ir a inicio') }}</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        </nav>
            
        </header>        
        
        <main class="bg-light mb-2 text-center">

            <div class="row mb-2">
                <div class="col-8 offset-2 text-center col-lg-6 offset-lg-3">
                    <h1 class="mb-2">¿De que trata el sistema?</h1>
                    <p>El proposito del sistema es generar un entorno de soporte a usuario mediante el uso de agentes y un servicio de mensajeria.</p>
                    <img class="img-fluid mb-2" src="https://www.techartes.com/wp-content/uploads/2018/12/customer-support-750x300.png" />
                    <h1>Usuarios</h1>
                    <p>El sistema realiza la implementacion de 3 tipos de usuario:</p>
                    <h4>Administrador</h4>
                    <p>Tiene el proposito de supervisar el rendimiento de los agentes de soporte mediante la implementacion de un tablero de estadisticas. Ademas, puede dar de baja tickets o reasignarlos a un agente diferente, adicionalmente puede dar de baja a usuarios.</p>
                    <h4>Agente de soporte</h4>
                    <p>Es el encargado de resolver las dudas de los clientes, para ello tienen que elegir entre la variedad de tickets disponibles, esto permitira tener un chat con el cliente. Adicionalmente, pueden ver su propio rendimiento y estadisticas basado en la cantidad de tickets resueltos y calificaciones recibidas.</p>
                    <h4>Cliente</h4>
                    <p>El cliente tiene la funcionalidad de realizar la alta de tickets, una vez recibido por un agente puede iniciar una conversacion con el. Cuando el cliente de por finalizado la conversacion, tiene la posibilidad de contestar una encuesta para calificar al agente y determinar si pudo resolver o no su problema. </p>
                </div>
            </div>
            
        </main>

        <footer class="bg-dark text-white">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </body>
</html>
