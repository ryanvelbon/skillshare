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
    @yield('styles')
    
</head>
<body>
    <div id="app">

        @include('inc.navbar')

        @include('inc.navbarSub')

        <div class="container">
            <div class="row">

                <div class="col-md-2 col-lg-2">
                    @yield('left')
                </div>
                
                <div class="col-md-6 col-lg-6">
                    @yield('centre')
                </div>

                <div class="col-md-4 col-lg-4">
                    @yield('right')
                </div>
            </div>
        </div>
    </div>

    @include('inc.footer')
    
    <!-- Scripts ------------------------------------>

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')


</body>
</html>
