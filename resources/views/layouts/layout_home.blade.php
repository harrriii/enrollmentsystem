<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MLQU Enrollment System</title>

        @include('inc/func/header')

       
    </head>
    <body>

        @include('inc/nav/home')
        
        @yield('content')

        @include('inc/func/footer')
        
        @yield('script')
        
    </body>
</html>
