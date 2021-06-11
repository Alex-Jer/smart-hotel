<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Table extends Component
{
    public $devices;
    public $regions = null;
    public $logs = null;
    public $isRoot = false;
    public $isLog = false;

    public function render()
    {
        return view('livewire.dashboard.table');
    }
}
