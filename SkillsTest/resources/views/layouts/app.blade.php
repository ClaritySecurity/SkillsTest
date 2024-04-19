<!DOCTYPE html>
<html>
    <head>
        <title>Clarity Skills Test</title>
        @vite(['resources/css/app.css', 'resources/css/bootstrap.css'])
    </head>

    <body>
        <div id="app"></div>
        @vite('resources/js/app.js')

        @yield('content')
    </body>
</html>
