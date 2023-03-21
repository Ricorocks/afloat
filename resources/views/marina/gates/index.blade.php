<x-marina.layouts.layout>
<div class="text-lg font-bold">Marina Gates</div>
@foreach($marina->gates as $gate)
<div class="p-3 ml-3">Edit <a href="{{ route('marina.gates.show', [$marina, $gate]) }}">{{ $gate->name }}</a></div>
@endforeach
</x-marina.layouts.layout>