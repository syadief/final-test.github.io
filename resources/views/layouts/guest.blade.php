<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Load CSS from Public Directory -->
        <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
        <link href="{{ asset('css/register.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
        <link href="{{ asset('build/css/demo.css') }}" rel="stylesheet">
        <link href="{{ asset('build/css/intlTelInput.css') }}" rel="stylesheet">

        <!-- Font Awesome untuk icon password -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        <!-- CSS untuk fitur show/hide password -->
        <link href="{{ asset('item/css/password.css') }}" rel="stylesheet">
    </head>
    <body>
        {{ $slot }}

        <script src="{{ asset('build/js/intlTelInput.js') }}"></script>
        <script>
            var input = document.querySelector("#phone");
            window.intlTelInput(input,{});
        </script>

        <!-- Script untuk fitur show/hide password -->
        <script src="{{ asset('item/js/password.js') }}"></script>
    </body>
</html>
