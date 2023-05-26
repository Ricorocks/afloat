@if ($content->button_1_link)
    @include('pages.pagecomponents.button', [
        'text' => $content->button_1_link_text,
        'link' => $content->button_1_link,
        'background_colour' => $content->button_1_background_colour,
        'foreground_colour' => $content->button_1_foreground_colour,
    ])
@endif
@if ($content->button_2_link)
    {{-- <a href="{{ $content->button_2_link }}" class="text-sm font-semibold leading-6 text-white">{{ $content->button_2_link_text }}<span
                            aria-hidden="true">→</span></a> --}}
    @include('pages.pagecomponents.button', [
        'text' => $content->button_2_link_text,
        'link' => $content->button_2_link,
        'background_colour' => $content->button_2_background_colour,
        'foreground_colour' => $content->button_2_foreground_colour,
    ])
@endif
