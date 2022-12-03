<?php

namespace App\Http\Livewire\Marina\Gates;

use App\Models\Gate;
use App\Models\GateEvent;
use Livewire\Component;

class GateEventList extends Component
{
    public function render()
    {
        $this->updateGateEvents();
        return view('livewire.marina.gates.gate-event-list');
    }

    public $gate;
    public $gateEvents;

    protected $listeners = ['gateEventsUpdated' => 'updateGateEvents'];

    public function updateGateEvents()
    {
        $this->gateEvents = $this->gate->gateEvents->sortByDesc('happens_at');
    }

    public function deleteEvent(GateEvent $gateEvent)
    {
        $gateEvent->delete();
        $this->updateGateEvents();
    }

}
