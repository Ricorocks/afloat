<a href="{{ $link }}" 
    class="rounded-md px-3.5 py-2.5 text-sm font-semibold shadow-sm  
    {{ $foreground_colour ?? 'text-brandlightblue' }}
    {{ $background_colour ?? 'bg-brandblue' }}
    hover:bg-brandlightblue hover:text-brandblue
    focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2  focus-visible:outline-indigo-400">
    {{ $text }}
</a>
