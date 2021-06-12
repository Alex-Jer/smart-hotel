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
        $url = url()->previous() . 'api/actuator';

        $data = [
            'name' => $this->actuator->name,
            'region_name' => $this->actuator->region->name,
            'value' => $value
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if (!$result) return response('POST error!', 400);
    }
}
