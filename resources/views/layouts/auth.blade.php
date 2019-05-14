<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/materialize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/application.css') }}" />
    </head>
    <body>
        <header>
            <div class="navbar-fixed">
                <nav class="nav-extended navbar-dark indigo darken-2 z-depth-2">
                    <div class="nav-wrapper">
                        <a href="{{route('home')}}" class="brand-logo">{{config('app.name', 'Copist')}}</a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                        </a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            @guest
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
            <ul id="slide-out" class="sidenav">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="http://via.placeholder.com/300x100">
                        </div>
                    </div>
                </li>
                @guest
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li >
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </header>
        <main>
            @yield('content')
        </main>
    </body>
    <script src="{{ asset('js/jquery-3.4.1.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/materialize.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/application.js') }}" type="text/javascript" defer></script>
</html>
