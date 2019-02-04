<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8"/>
        <title>ObjectSys</title>
        <link rel='shortcut icon' type='image/x-icon' src="{{ asset('favicon.ico') }}"/>
        @yield('imports')

    </head>
    <body>

        @yield('menu')

        @yield('conteudo')

        @yield('scripts')

        @yield('footer')

    </body>
</html>
