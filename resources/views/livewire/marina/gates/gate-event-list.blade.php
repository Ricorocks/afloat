<div class="grid grid-cols-3">
    @foreach($gateEvents as $gateEvent)
        <div>{{ $gateEvent->label }}</div>
        <div>{{ $gateEvent->happens_at->format('d/m/Y H:i') }}</div>
        <button wire:click="deleteEvent('{{ $gateEvent->id }}')">Delete</button>
    @endforeach
</div>
