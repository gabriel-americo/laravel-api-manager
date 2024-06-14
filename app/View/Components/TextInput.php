<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TextInput extends Component
{
    public $name;
    public $label;
    public $value;
    public $placeholder;
    public $type;
    public $required;
    public $id;

    public function __construct($name, $label, $value = null, $placeholder = null, $type = 'text', $required = false, $id = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->required = $required;
        $this->id = $id;
    }

    public function render(): View|Closure|string
    {
        return view('admin.components.text-input');
    }
}
