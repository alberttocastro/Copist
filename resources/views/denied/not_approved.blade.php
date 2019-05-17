<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', 'Copist') }}</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/materialize.css') }}" />
    </head>
    <body>
        <header>
            <div class="navbar-fixed">
                <nav class="nav-extended navbar-dark indigo darken-2 z-depth-2">
                    <div class="nav-wrapper">
                        <a href="{{route('home')}}" class="brand-logo">{{ config('app.name', 'Copist') }}</a>
                </nav>
            </div>
        </header>
        <main>
            <div class="row">
                <h2 class="center-align" style="width:100%">Sorry</h2>
                <h5 class="center-align" style="width:100%">You were not yet granted access. Please, contact one of the administrators.</h5>
            </div>
        </main>
    </body>
    <script src="{{ asset('js/jquery-3.4.1.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/materialize.js') }}" type="text/javascript" defer></script>
</html>