<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Highlights extends Component
{
    public $sensors;
    public $region;
    public $sensorName;
    public $svg;

    public function render()
    {
        return view('livewire.dashboard.highlights');
    }
}
