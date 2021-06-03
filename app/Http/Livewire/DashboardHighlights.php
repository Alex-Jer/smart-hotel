<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardHighlights extends Component
{
    public $sensors;
    public $region;
    public $sensorName;
    public $svg;

    public function render()
    {
        return view('livewire.dashboard-highlights');
    }
}
