<x-marina.layouts.layout>
<div class="text-lg font-bold">Marina Gates</div>
<div class="p-3 ml-3">{{ $gate->name }}</div>
<div class="grid grid-cols-2 gap-3 p-8">
    <livewire:marina.gates.gate-event-list :gate="$gate" />
    <div>
        <livewire:marina.gates.gate-event-add :gate="$gate" />
    </div>
</div>
</x-marina.layouts.layout>