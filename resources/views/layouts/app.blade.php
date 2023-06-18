<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Il mio sito web</title>
        
        @vite(['resources/css/app.css'])
    </head>
    <body>
        @yield('body')
    </body>
</html>