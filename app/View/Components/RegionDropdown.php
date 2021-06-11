<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegionDropdown extends Component
{
    public $regions = null;
    public $numberedRegion = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($regions, $numberedRegion)
    {
        $this->regions = $regions;
        $this->numberedRegion = $numberedRegion;
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
