<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href={{ asset('css/app.css') }}>
    </head>
    <body>
        @include('layouts.header')
        @yield('content')
        
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
