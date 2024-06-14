<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SearchHeader extends Component
{
    public $placeholder;

    public function __construct($placeholder)
    {
        $this->placeholder = $placeholder;
    }

    public function render(): View|Closure|string
    {
        return view('admin.components.search-header');
    }
}
