<x-user.layouts.layout>
    <x-user.dashboard.dashboard :marina="$marina">
        
        <h1 class="text-2xl font-bold mb-5">Welcome {{ $user->name }}</h1>

        <div class="grid grid-cols-3 gap-5">
            <x-user.dashboard.block title="Your Boat">
                <p>{{ $activeBoat->name }}</p>
                <p>Draught: {{ $activeBoat->draught_in_cm }}cm</p>
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Your Digital Keys">
                @foreach($user->keys as $key)
                <p>{{ Str::limit($key->code, 15) }}</p>
                @endforeach
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Your Vehicles">
                @foreach($user->vehicles as $vehicle)
                <p>{{ $vehicle->make }}: {{ $vehicle->registration }}</p>
                @endforeach
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Your Invoices">
                (none)
            </x-user.dashboard-block>
            <x-user.dashboard.block title="Your Messages">
                (none)
            </x-user.dashboard-block>
        </div>
        
    </x-user.dashboard.dashboard>
</x-user.layouts.layout>