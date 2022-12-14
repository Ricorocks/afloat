<?php

namespace App\Http\Livewire\Marina\Gates;

use App\Models\Gate;
use App\Models\GateEvent;
use Livewire\Component;

class GateEventAdd extends Component
{
    public function render()
    {
        return view('livewire.marina.gates.gate-event-add');
    }

    public $gate;
    public $label;
    public $happensAt;

    protected $rules = [
        'label' => 'required|min:2',
        'happensAt' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {   
        $this->validate();
        
        $this->gate->gateEvents()->save(new GateEvent([
            'label' => $this->label,
            'happens_at' => $this->happensAt,
        ]));

        session()->flash('message', 'Event Added');
        $this->emit('gateEventsUpdated');
        $this->label = "";
        $this->happensAt = "";
    }
}
