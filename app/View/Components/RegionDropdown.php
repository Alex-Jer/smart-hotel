<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegionDropdown extends Component
{
    public $regions = null;
    public $room = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($regions, $room)
    {
        $this->regions = $regions;
        $this->room = $room;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.region-dropdown');
    }
}
