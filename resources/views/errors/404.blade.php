
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
  class="h-full bg-brandblue">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>404 - Lost at Sea</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="h-full">
        <main class="relative isolate min-h-full" x-data="{foo:true}" x-init="console.log(foo)">
            <img src="{{ asset('assets/images/open-ocean.jpg') }}" alt="" 
              class="absolute inset-0 -z-10 h-full w-full object-cover object-top">
            <div class="mx-auto max-w-7xl px-6 py-32 text-center sm:py-40 lg:px-8 ">
              <p class="text-base font-semibold leading-8 text-white">404</p>
              <h1 class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-5xl">Page not found, you are afloat</h1>
              <p class="mt-4 text-base text-white/70 sm:mt-6">Sorry, we couldn’t find the page you’re looking for.</p>
              <div class="mt-10 flex justify-center">
                <a href="/" class="text-sm font-semibold leading-7 text-white"><span aria-hidden="true">&larr;</span> Back to home</a>
              </div>
            </div>
          </main>
    </body>
</html>
