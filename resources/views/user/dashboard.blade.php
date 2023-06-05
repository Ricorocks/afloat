@extends('layouts.customer-statamic', ['logon_type' => 'customer'])
@section('main')
    <x-app-layout>
        <div class="py-12">
            <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
                <!-- Left column -->


                



                <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                    <section aria-labelledby="section-1-title">

                            <div class="rounded-2xl bg-brandblue px-8 py-10">
                              {{-- <img class="mx-auto h-48 w-48 rounded-full md:h-56 md:w-56" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt=""> --}}
                              <div class="mx-auto h-48 w-48 rounded-full md:h-56 md:w-56 bg-brandwhite">
                                <x-heroicon-o-camera class="w-24 m-auto h-full text-brandgrey/[0.5]" />
                              </div>
                              <h3 class="mt-6 font-semibold text-lg leading-7 tracking-tight text-white">{{ $activeBoat->name }}</h3>
                              <p class="leading-6 text-brandwhite">Length: {{ $activeBoat->length_in_cm/100 }}m / Draught: {{ $activeBoat->draught_in_cm }}cm</p>
                              <ul role="list" class="mt-6 flex justify-center gap-x-6 border-t">
                                <li>
                                  <a href="#" class="text-brandwhite hover:text-brandlightblue">
                                    Marina
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="text-brandwhite hover:text-brandlightblue">
                                    Berth
                                  </a>
                                </li>
                              </ul>
                            </div>

                        {{-- <h2 class="sr-only" id="section-1-title">Section title</h2>
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
                        </div> --}}
                    </section>
                </div>

                <!-- Right column -->
                <section aria-labelledby="section-2-title">
                    <div class="grid grid-cols-1 gap-4">

                        <div>
                            <ul role="list" class="grid grid-cols-1 gap-y-5 ">
                                <li class="col-span-1 flex rounded-md shadow-sm">
                                    <div
                                        class="flex w-16 flex-shrink-0 items-center justify-center bg-brandblue rounded-l-md text-sm font-medium text-white text-center">
                                        VHF <br /> {{ $marina->vhf_channel }}
                                    </div>
                                    <div
                                        class="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                                        <div class="flex-1 truncate px-4 py-2">
                                            <a href="#"
                                                class="font-bold text-gray-900 hover:text-gray-600">{{ $marina->name }}</a>
                                            <p class="text-gray-500">Tel: {{ $marina->phone_number }}</p>
                                        </div>
                                        <div class="flex-shrink-0 pr-2">
                                            <button type="button"
                                                class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                <span class="sr-only">Learn More</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="overflow-hidden rounded-md bg-white shadow-sm border">
                            <div class="p-6">
                                @include('user.components.marinaevents', ['events' => $marina->nextEvents])
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </x-app-layout>
@endsection
