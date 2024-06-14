<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    public $type;
    public $message;

    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render(): View|Closure|string
    {
        return view('admin.components.alert');
    }
}
