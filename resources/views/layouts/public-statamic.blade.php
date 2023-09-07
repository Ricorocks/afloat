<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-brandwhite">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
        @stack('scripts')
    </head>
    <body>
        <div class="bg-white">
            @include('layouts.pagecomponents.header')

            @yield('main')

            @include('layouts.pagecomponents.footer')
        </div>
    </body>
</html>
