<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Почта России') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>

@if(Session::has('popup_msg'))
    {!! Session::get('popup_msg') !!}
@endif

@yield('app')

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/ClassSynchronization.js') }}"></script>
<script src="{{ asset('js/ClassApplication.js') }}"></script>
<script src="{{ asset('js/ClassQueue.js') }}"></script>
<script src="{{ asset('js/ClassApplicationsOnInfo.js') }}"></script>

@stack('scripts')
</body>
</html>
