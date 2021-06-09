<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class ToggleButton extends Component
{
    public $sensor;
    public $field;
    public $isToggled;

    public function mount()
    {
        $this->isToggled = (bool) $this->sensor->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.dashboard.toggle-button');
    }

    public function updating($field, $value)
    {
        $this->sensor->setAttribute($this->field, $value)->save();
    }
}
