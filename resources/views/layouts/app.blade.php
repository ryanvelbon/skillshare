<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.navbar')



        @include('inc.navbarSub')

        <div class="container">
            @if(Request::is('/'))
                @include('inc.showcase')
            @endif
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    @include('inc.sidebarL')
                </div>
                <div class="col-md-7 col-lg-7">
                    @include('inc.messages')
                    @yield('content')
                </div>
                <div class="col-md-2 col-lg-2">
                    @include('inc.sidebarR')
                </div>
            </div>
        </div>
    </div>

    <footer id="footer" class="text-center">
        <p>Copyright 2019 &copy; Red Pill Skills</p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
