<html>
    <head>
        <title>Copist</title>
    </head>
    <body>
        <header>
            @yield('bar', View::make('application.bar'))
        </header>
        <main>
            @yield('main')
        </main>
        <footer>
            @yield('bar', View::make('application.footer'))
        </footer>
    </body>
</html>