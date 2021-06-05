<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Table extends Component
{
    public $sensors;
    public $regions = null;
    public $isRoot = false;

    public function render()
    {
        return view('livewire.dashboard.table');
    }
}
