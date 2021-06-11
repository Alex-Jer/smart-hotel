<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class ToggleButton extends Component
{
    public $actuator;
    public $field;
    public $isToggled;

    public function mount()
    {
        $this->isToggled = (bool) $this->actuator->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.dashboard.toggle-button');
    }

    public function updating($field, $value)
    {
        $this->actuator->setAttribute($this->field, $value)->save();
    }
}
