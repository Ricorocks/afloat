    <!-- Hero section -->
    @props(['content'])
    <div class="relative isolate overflow-hidden bg-gray-900 pb-16 pt-14 sm:pb-20">
        <img src="{{ $content->background_image->url ?? 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2830&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply' }}"
            alt="" class="absolute inset-0 -z-10 h-full w-full object-cover ">
        <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl bg-sky-900 opacity-60"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl {{ $content->shorten_header ? 'py-14' : 'py-32 sm:py-48 lg:py-36' }}">
                @if($content->news_link && $content->news_link)
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="relative rounded-full px-3 py-1 text-sm leading-6 text-white ring-1 ring-white/10 hover:ring-white/20">
                        {{ $content->news_content }} <a href="{{ $content->news_link }}" class="font-semibold text-white"><span
                                class="absolute inset-0" aria-hidden="true"></span>Read more <span
                                aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
                @endif
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">{{ $content->hero_title }}</h1>
                    <p class="mt-6 text-lg leading-8 text-white">{{ $content->hero_content }}</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        @if ($content->button_1_link)
                            @include('layouts.pagecomponents.button', [
                                'text' => $content->button_1_link_text, 
                                'link' => $content->button_1_link, 
                                'background_colour' => $content->button_1_background_colour, 
                                'foreground_colour' => $content->button_1_foreground_colour
                                ])
                        @endif
                        @if ($content->button_2_link)
                        {{-- <a href="{{ $content->button_2_link }}" class="text-sm font-semibold leading-6 text-white">{{ $content->button_2_link_text }}<span
                            aria-hidden="true">→</span></a> --}}
                            @include('layouts.pagecomponents.button', [
                                'text' => $content->button_2_link_text, 
                                'link' => $content->button_2_link,
                                'background_colour' => $content->button_2_background_colour, 
                                'foreground_colour' => $content->button_2_foreground_colour
                                ])
                        @endif
                    </div>
                </div>
            </div>

            @if($content->logo_cloud)
            <!-- Logo cloud -->
            <div
                class="mx-auto grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/transistor-logo-white.svg" alt="Transistor"
                    width="158" height="48">
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/reform-logo-white.svg" alt="Reform" width="158"
                    height="48">
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/tuple-logo-white.svg" alt="Tuple" width="158"
                    height="48">
                <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/savvycal-logo-white.svg" alt="SavvyCal" width="158"
                    height="48">
                <img class="col-sFpan-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                    src="https://tailwindui.com/img/logos/158x48/statamic-logo-white.svg" alt="Statamic" width="158"
                    height="48">
            </div>
            @endif

        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>
