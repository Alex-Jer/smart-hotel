<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Master extends Component
{
    public $title;
    public $regions;

    /**
     * Create a new component instance.
     * @param  string  $title
     * @param  string  $regions
     * @return void
     */
    public function __construct($title, $regions)
    {
        $this->title = $title;
        $this->regions = $regions;
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
