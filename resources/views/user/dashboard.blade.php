@extends('layouts.customer-statamic', ['logon_type' => 'customer'])
@section('main')
<x-app-layout>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
            <!-- Left column -->
            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                <section aria-labelledby="section-1-title">
                    <h2 class="sr-only" id="section-1-title">Section title</h2>
                    <div class="overflow-hidden rounded-lg bg-white shadow">
                        <div class="p-6">
                            <div class="grid grid-cols-3 gap-5">
                                <x-user.dashboard.block title="Your Boat">
                                    <p>{{ $activeBoat->name }}</p>
                                    <p>Draught: {{ $activeBoat->draught_in_cm }}cm</p>
                                    </x-user.dashboard-block>
                                    <x-user.dashboard.block title="Your Digital Keys">
                                        @foreach (auth()->user()->keys as $key)
                                            <p>{{ Str::limit($key->code, 15) }}</p>
                                        @endforeach
                                        </x-user.dashboard-block>
                                        <x-user.dashboard.block title="Your Vehicles">
                                            @foreach (auth()->user()->vehicles as $vehicle)
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
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right column -->
            <div class="grid grid-cols-1 gap-4">
                <section aria-labelledby="section-2-title">
                    <h2 class="sr-only" id="section-2-title">Section title</h2>
                    <div class="overflow-hidden rounded-lg bg-white shadow">
                        <div class="p-6">

                            <h2 class="text-2xl font-bold mb-5">{{ $marina->name }}</h2>
                            <div class="mb-5">
                                <h3 class="text-lg font-bold">Contact</h3>
                                <p>VHF Channel: {{ $marina->vhf_channel }}</p>
                                <p>Tel: {{ $marina->phone_number }}</p>
                            </div>
                            @dump($marina->nextEvents)
                            @include('user.components.marinaevents', ['events' => []])
                            <div class="mb-5">
                                <h3 class="text-lg font-bold">Messages</h3>
                                <p>None</p>
                            </div>
                            <div class="mb-5">
                                <h3 class="text-lg font-bold">Weather</h3>
                                <p>x</p>
                                <p>x</p>
                                <p>x</p>
                                <p>x</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection