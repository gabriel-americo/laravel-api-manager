<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ToolbarList extends Component
{
    public $title;
    public $subTitle;
    public $type;

    public function __construct($title, $subTitle, $type)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->type = $type;
    }

    public function render(): View|Closure|string
    {
        return view('admin.components.toolbar-list');
    }
}
