<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $regions;

    /**
     * Create a new component instance.
     *
     * @param  string  $regions
     * @return void
     */
    public function __construct($regions)
    {
        $this->regions = $regions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.sidebar');
    }
}
