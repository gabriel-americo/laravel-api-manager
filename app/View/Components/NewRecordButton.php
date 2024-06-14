<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class NewRecordButton extends Component
{
    public $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function render(): View|Closure|string
    {
        return view('admin.components.new-record-button');
    }
}
