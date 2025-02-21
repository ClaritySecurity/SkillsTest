<!DOCTYPE html>
<html>
    <head>
        <title>Clarity Skills Test</title>
        @vite(['resources/css/app.css', 'resources/css/bootstrap.css'])
    </head>

    <body>
        <div id="app">
        @vite('resources/js/app.js')

        @yield('content')
        </div>
    </body>
</html>
