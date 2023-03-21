<?php

namespace App\Http\Livewire\Marina\Berths;

use App\Models\Berth;
use Livewire\Component;

class Manage extends Component
{
    public function render()
    {
        $this->updateBerths();
        return view('livewire.marina.berths.manage');
    }

    public $marina;
    public $marinaBerths;

    protected $listeners = [
        'updateBerths' => 'updateBerths',
        'moveBerth' => 'moveBerth'
    ];

    public function updateBerths()
    {
        $this->marinaBerths = $this->marina->berths->sortBy('leg')->sortBy('berth_number');
    }
    
    public function selectBerth(Berth $berth)
    {
        $this->emit('selectBerth', $berth);
    }

    public function moveBerth(Array $berth)
    {
        $this->marinaBerths->firstWhere('id', $berth['id'])->update([
            'overlay_x' => $berth['overlay_x'],
            'overlay_y' => $berth['overlay_y']
        ]);
    }


}
