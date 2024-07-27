<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputAnimated extends Component
{
    public $type;
    public $name;
    public $id;
    public $placeholder;
    public $required;
    public $autocomplete;
    public $label;

    public function __construct($type = '', $name, $id = '', $placeholder = '', $required = false, $autocomplete = '', $label = '')
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->autocomplete = $autocomplete;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.input-animated');
    }
}
