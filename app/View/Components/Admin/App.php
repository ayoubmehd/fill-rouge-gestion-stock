<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class App extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $menuItems = [
            [
                'icon' => "mdi-view-dashboard",
                'text' => "Dashboard",
                'to' => \route('admin.index'),
            ],
            [
                'icon' => "mdi-filter",
                'text' => "Categories",
                'to' => \route('admin.categories.index'),
            ],
            [
                'icon' =>  "mdi-account",
                'text' => "Users",
                'to' => \route('admin.users.index'),
            ],
            [
                'icon' =>  "mdi-lightbulb-on",
                'text' => "Products",
                'to' => \route('admin.produits.index'),
            ],
        ];

        $rightMenuItems = [
            [
                'icon' => "mdi-logout",
                'to' => \route('logout')
            ]
        ];

        return view('components.admin.app', ['menuItems' => $menuItems, 'rightMenuItems' => $rightMenuItems]);
    }
}