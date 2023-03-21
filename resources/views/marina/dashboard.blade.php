<x-user.layouts.layout>
    <x-user.dashboard.dashboard :marina="$marina" :mainGateActions="$mainGateActions">
        
        <h1 class="text-2xl font-bold mb-5">Welcome {{ $marina->name }}</h1>

        <div class="grid grid-cols-3 gap-5">
            <x-user.dashboard.block title="Boats">
                {{-- <p>{{ $activeBoat->name }}</p>
                <p>Draught: {{ $activeBoat->draught_in_cm }}cm</p> --}}
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Digital Keys">
                {{-- @foreach($user->keys as $key)
                <p>{{ Str::limit($key->code, 15) }}</p>
                @endforeach --}}
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Vehicles">
                {{-- @foreach($user->vehicles as $vehicle)
                <p>{{ $vehicle->make }}: {{ $vehicle->registration }}</p>
                @endforeach --}}
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Invoices">
                (none)
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Messages">
                (none)
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Arrivals">
                (none)
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Berths">
                <div><a href="{{ route('marina.berths.manage', [$marina]) }}">Manage</a></div>
                <div><a href="{{ route('marina.berths.overview', [$marina]) }}">Overview</a></div>
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Gates">
                @foreach($marina->gates as $gate)
                <div class="p-3">
                    <a href="{{ route('marina.gates.events.show', [$marina, $gate]) }}">View {{ $gate->name }}</a>
                </div>
                @endforeach
                <a href="{{ route('marina.gates.index', $marina) }}">Edit Gates</a>
            </x-user.dashboard-block>
        </div>
        
    </x-user.dashboard.dashboard>
</x-user.layouts.layout>