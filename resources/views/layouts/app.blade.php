<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', 'Copist') }}</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    </head>
    <body>
        <header>
            <div class="navbar-fixed">
                <nav class="nav-extended navbar-dark indigo darken-2 z-depth-2">
                    <div class="nav-wrapper">
                        <a href="{{route('home')}}" class="brand-logo">{{ config('app.name', 'Copist') }}</a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                        </a>
                        @yield('bar', View::make('layouts.bar'))
                    </div>
                    <div class="nav-content">
                        @yield('header')
                    </div>
                </nav>
            </div>
            @yield('sidenav', View::make('layouts.sidenav'))
        </header>
        <main>
            @yield('main')
        </main>
        <footer>
            @yield('bar', View::make('layouts.footer'))
        </footer>
    </body>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</html>
