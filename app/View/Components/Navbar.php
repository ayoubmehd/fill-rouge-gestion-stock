<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Navbar extends Component
{

    public $menuItems;
    public $rightMenuItems;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $menuItems, $rightMenuItems)
    {
        $this->menuItems = $menuItems;
        $this->rightMenuItems = $rightMenuItems;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar', [
            'menuItems' => $this->menuItems,
            'rightMenuItems' => $this->rightMenuItems,
            'title' => $this->title
        ]);
    }
}