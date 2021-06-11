<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Master extends Component
{
    public $title;
    public $regions;
    public $numberedRegion;
    public $isRoot;

    /**
     * Create a new component instance.
     * @param  string  $title
     * @param  collection  $regions
     * @param  region  $numberedRegion
     * @param  bool $isRoot
     * @return void
     */
    public function __construct($title, $regions, $numberedRegion = null, $isRoot = false)
    {
        $this->title = $title;
        $this->regions = $regions;
        $this->numberedRegion = $numberedRegion;
        $this->isRoot = $isRoot;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.master');
    }
}
