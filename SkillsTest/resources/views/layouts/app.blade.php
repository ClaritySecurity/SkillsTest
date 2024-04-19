<!DOCTYPE html>
<html>
    <head>
        <title>Clarity Skills Test</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body>
        <div id="section-main">
            @yield('content')
        </div>

        <script src="{{ asset('js/vue-app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
