@props(['events'])
<div class="flow-root">
    <ul role="list" class="-mb-8">
        @foreach ($events->slice(0, 8) as $event)
            <li>
                <div class="relative pb-8">
                    @if (!$loop->last)
                        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                    @endif

                    <div class="relative flex space-x-3">

                        @if(get_class($event) == "App\Models\GateEvent")
                        
                        @if ($event->label == 'raised')
                            <div>
                                <span
                                    class="h-8 w-8 rounded-full bg-white flex items-center justify-center ring-2 ring-brandblue">
                                    <x-heroicon-o-upload class="h-5 w-5 text-brandblue" />
                                </span>
                            </div>
                        @elseif($event->label == 'lowered')
                            <div>
                                <span
                                    class="h-8 w-8 rounded-full bg-brandblue flex items-center justify-center ring-2 ring-brandblue">
                                    <x-heroicon-o-download class="h-5 w-5 text-white" />
                                </span>
                            </div>
                        @endif
                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                            <div>
                                <p class="text-sm text-gray-500">
                                    {{ $event->happens_at->format('H:i') }} -
                                    @if ($event->label == 'raised')
                                        {{ $event->gate->name }} Raised
                                    @elseif($event->label == 'lowered')
                                        {{ $event->gate->name }} Lowered
                                    @endif
                                </p>
                            </div>
                            <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                <time datetime="2020-09-20">{{ $event->happens_at->format('M d') }}</time>
                            </div>
                        </div>

                        @elseif(get_class($event) == "App\Models\Tide")

                        @if ($event->type == 'HIGH')
                            <div>
                                <span
                                    class="h-8 w-8 rounded-full bg-brandblue flex items-center justify-center ring-2 ring-brandblue">
                                    <x-heroicon-o-chevron-double-up class="h-5 w-5 text-white" />
                                </span>
                            </div>
                        @elseif($event->type == 'LOW')
                            <div>
                                <span
                                    class="h-8 w-8 rounded-full bg-white flex items-center justify-center ring-2 ring-brandblue">
                                    <x-heroicon-o-chevron-double-down class="h-5 w-5 text-brandblue" />
                                </span>
                            </div>
                        @endif
                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                            <div>
                                <p class="text-sm text-gray-500">
                                    {{ $event->happens_at->format('H:i') }} -
                                    @if ($event->type == 'HIGH')
                                        High Tide
                                    @elseif($event->type == 'LOW')
                                        Low Tide
                                    @endif
                                    ({{ $event->height / 100 }}m)
                                </p>
                            </div>
                            <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                <time datetime="2020-09-20">{{ $event->happens_at->format('M d') }}</time>
                            </div>
                        </div>

                        @endif
                        
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
