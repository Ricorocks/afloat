<?php

namespace App\Http\Livewire\Marina\Berths;

use App\Models\Berth;
use App\Models\Marina;
use Livewire\Component;

class Add extends Component
{
    public function render()
    {
        $this->overlay_x = 50;
        $this->overlay_y = 50;
        return view('livewire.marina.berths.add');
    }

    public Marina $marina;
    public $currentBerth;
    public int $overlay_x;
    public int $overlay_y;

    protected $listeners = ['selectBerth' => 'selectBerth'];

    public function selectBerth(Berth $berth)
    {
        $this->currentBerth = $berth->toArray();
        $this->overlay_x = $berth->overlay_x;
        $this->overlay_y = $berth->overlay_y;
        $this->overlay_x++;
    }

    public function saveBerth()
    {
        $this->currentBerth['marina_id'] = $this->marina->id;
        Berth::updateOrCreate(
            ['id' => $this->currentBerth['id'] ?? null] ,
            $this->currentBerth,
        );
        $this->emit('updateBerths');
    }

    public function resetRequired()
    {
        $this->currentBerth = [];
    }

    public function increment(String $value)
    {
        if($this->currentBerth[$value] < 100)
        {
            $this->currentBerth[$value]++;
            $this->emit('moveBerth', $this->currentBerth);
        }
    }

    public function decrement(String $value)
    {
        if($this->currentBerth[$value] > 0)
        {
            $this->currentBerth[$value]--;
            $this->emit('moveBerth', $this->currentBerth);
        }
    }
}
