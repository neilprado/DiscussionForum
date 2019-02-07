<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{config('app.name'), 'TechForum'}}</title>
</head>
<body>
    @include('components.navbar')
    <div class="container">
        @include('components.messages')
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>