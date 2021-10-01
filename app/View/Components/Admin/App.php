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
                'exact' => true
            ],
            [
                'icon' => "mdi-cart-plus",
                'text' => "Orders",
                'to' => \route('admin.orders.index'),
                'exact' => true
            ],
            [
                'icon' =>  "mdi-account",
                'text' => "Users",
                'to' => \route('admin.users.index'),
                'exact' => true
            ],
            [
                'icon' =>  "mdi-lightbulb-on",
                'text' => "Products",
                'to' => \route('admin.products.index'),
                'exact' => true
            ],
        ];

        $rightMenuItems = [
            [
                'icon' => "mdi-account"
            ]
        ];

        return view('components.admin.app', ['menuItems' => $menuItems, 'rightMenuItems' => $rightMenuItems]);
    }
}