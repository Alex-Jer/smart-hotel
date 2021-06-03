<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sensor;

class ShowPoolTemp extends Component
{
    public $sensor;
    public $sensorId;

    public function render()
    {
        $this->sensor = Sensor::find($this->sensorId);
        return view('livewire.show-pool-temp');
    }
}
