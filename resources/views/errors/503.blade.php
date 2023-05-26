
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
  class="h-full bg-brandblue">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>503 - Down</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="h-full">
        <main class="relative isolate min-h-full">
            <img src="{{ asset('assets/images/boatdeck.jpg') }}" alt="" 
              class="absolute inset-0 -z-10 h-full w-full object-cover object-top">
            <div class="mx-auto max-w-7xl px-6 py-32 text-center sm:py-40 lg:px-8 ">
              <p class="text-base font-semibold leading-8 text-white">500 - Maintenence</p>
              <h1 class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-5xl">We&rsquo;ll be back soon!</h1>
              <p class="mt-4 text-base text-white/70 sm:mt-6">Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment.
                We&rsquo;ll be back online shortly!</p>
            </div>
          </main>
    </body>
</html>
