<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class MenuItem extends Component
{
    public $icon;
    public $title;
    public $route;
    public $subItems;
    public $showArrow;

    public function __construct($icon, $title, $route, $subItems = [], $showArrow = true)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->route = $route;
        $this->subItems = $subItems;
        $this->showArrow = $showArrow;
    }

    public function render(): View|Closure|string
    {
        return view('admin.components.menu-item');
    }
}
