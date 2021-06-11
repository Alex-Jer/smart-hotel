<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Highlights extends Component
{
    public $actuators;
    public $region;
    public $actuatorName;
    public $svg;

    public function render()
    {
        return view('livewire.dashboard.highlights');
    }
}
