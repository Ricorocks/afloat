<div>
    <div class="w-full h-full relative" x-data>
        <img src="{{ asset('assets/Berthing-Map3-scaled.jpg') }}" alt="" style="pointer-events: none;">
        @foreach ($marinaBerths as $berth)
        <div class="absolute" draggable="true" style="left:{{ $berth->overlay_x }}%; top:{{ $berth->overlay_y }}%; transform:rotate({{ $berth->overlay_rotate }}deg); ">
            <button wire:click="selectBerth({{$berth}})">
                <x-icons.boat />
            </button>
        </div>
        @endforeach
    </div>
    <div class="grid grid-cols-3">
        @foreach ($marinaBerths as $berth)
            <div>{{ $berth->leg }}</div>
            <div>{{ $berth->berth_number }}</div>
            <div>L:{{ $berth->max_length_in_cm }} x W:{{ $berth->max_width_in_cm }} x D:{{ $berth->max_draught_in_cm }}
            </div>
        @endforeach
    </div>
</div>
