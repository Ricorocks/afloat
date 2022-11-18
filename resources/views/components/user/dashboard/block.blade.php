@props(['title'])
<div class="shadow shadow-gray-400 rounded-md p-5">
    <h2 class="font-bold text-lg">{{ $title }}</h2>
    {{ $slot }}
</div>