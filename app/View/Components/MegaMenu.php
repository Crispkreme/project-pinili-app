<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MegaMenu extends Component
{
    public $menuLists;

    /**
     * Create a new component instance.
     */
    public function __construct($menuLists)
    {
        $this->menuLists = $menuLists;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mega-menu');
    }
}
