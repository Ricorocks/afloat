<div class="relative z-10 mt-32 pb-20 sm:mt-56 sm:pb-24 xl:pb-0 {{ $content->background_colour ?? 'bg-brandblue' }} ">
    <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight {{ $content->foreground_colour ?? 'text-white' }} sm:text-4xl">{{ $content->title }}</h2>
        <p class="mx-auto mt-6 max-w-xl text-lg leading-8  {{ $content->foreground_colour ?? 'text-white' }}  ">{{ $content->content }}</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            @if ($content->button_1_link)
                @include('pages.pagecomponents.button', [
                    'text' => $content->button_1_link_text, 
                    'link' => $content->button_1_link, 
                    'background_colour' => $content->button_1_background_colour, 
                    'foreground_colour' => $content->button_1_foreground_colour
                    ])
            @endif
            @if ($content->button_2_link)
            {{-- <a href="{{ $content->button_2_link }}" class="text-sm font-semibold leading-6 text-white">{{ $content->button_2_link_text }}<span
                aria-hidden="true">→</span></a> --}}
                @include('pages.pagecomponents.button', [
                    'text' => $content->button_2_link_text, 
                    'link' => $content->button_2_link,
                    'background_colour' => $content->button_2_background_colour, 
                    'foreground_colour' => $content->button_2_foreground_colour
                    ])
            @endif
        </div>
      </div>
    </div>
  </div>
  