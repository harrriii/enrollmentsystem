<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
    <head>

        <meta charset="utf-8">
   
        <meta name="csrf-token" content="{{ csrf_token() }}">
   
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>
        
        @include('inc/func/header')
       
    </head>
   
    <body>

        @include('inc/nav/dashboard')
        
            @if ($role == 'secretary')
                
                @include('inc/sidebar/secretary/dashboard')

            @endif

            @if ($role == 'registrar')
                
                @include('inc/sidebar/registrar/dashboard')

            @endif

            @if ($role == 'adviser')
                
                @include('inc/sidebar/adviser/dashboard')

            @endif

            @if ($role == 'student')
                
                @include('inc/sidebar/student/dashboard')

            @endif

            @if ($role == 'dean')
                
                @include('inc/sidebar/dean/dashboard')

            @endif

            @if ($role == 'administrator')
                
                @include('inc/sidebar/administrator/dashboard')

            @endif

            @if ($role == 'developer')
                
                @include('inc/sidebar/developer/dashboard')

            @endif
        
        @include('inc/func/footer')

        @yield('script')

    </body>

</html>
