
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
  class="h-full bg-brandblue">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>403 - Clearly Pirates</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="h-full">
        <main class="relative isolate min-h-full">
            <img src="{{ asset('assets/images/open-ocean.jpg') }}" alt="" 
              class="absolute inset-0 -z-10 h-full w-full object-cover object-top">
            <div class="mx-auto max-w-7xl px-6 py-32 text-center sm:py-40 lg:px-8 ">
              <p class="text-base font-semibold leading-8 text-white">403</p>
              <h1 class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-5xl">Unauthorisd</h1>
              <p class="mt-4 text-base text-white/70 sm:mt-6">Sorry, you don't have permission to come aboard here. Try logging on again.</p>
              <div class="mt-10 flex justify-center">
                <a href="/" class="text-sm font-semibold leading-7 text-white"><span aria-hidden="true">&larr;</span> Back to home</a>
              </div>
            </div>
          </main>
    </body>
</html>
