<html>
    <head>
        <title>Copist</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/materialize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/application.css') }}" />
    </head>
    <body>
        <header>
            <div class="navbar-fixed">
                <nav class="nav-extended navbar-dark indigo darken-2 z-depth-2">
                    <div class="nav-wrapper">
                        <a href="home.html" class="brand-logo">Coins</a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                        </a>
                        @yield('bar', View::make('application.bar'))
                    </div>
                    <div class="nav-content">
                        @yield('header')
                    </div>
                </nav>
            </div>
            @yield('sidenav', View::make('application.sidenav'))
        </header>
        <main>
            @yield('main')
        </main>
        <footer>
            @yield('bar', View::make('application.footer'))
        </footer>

        <script src="{{ asset('js/materialize.js') }}" type="text/javascript" async="true" defer></script>
        <script src="{{ asset('js/application.js') }}" type="text/javascript" async="true" defer></script>
    </body>
</html>