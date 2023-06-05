<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-brandwhite">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Afloat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="bg-white">
        <div class="bg-brandblue p-3 h-16">
            <div>@include('pages.pagecomponents.header')</div>
        </div>

        <div>
            @yield('main')
        </div>

        @include('pages.pagecomponents.footer')
    </div>
    <div class="hidden text-brandblue text-brandlightblue text-brandgrey text-brandwhite 
    bg-brandblue bg-brandlightblue bg-brandgrey bg-brandwhite"></div>
</body>

</html>
