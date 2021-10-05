<?php

namespace App\View\Components\User;

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
                'icon' => "mdi-view-home",
                'text' => "Home",
                'to' => '/',
            ],
            [
                'icon' =>  "mdi-lightbulb-on",
                'text' => "Products",
                'to' => \route('produits.index', ['per_page' => 12]),
            ],
            [
                'icon' => "mdi-cart-plus",
                'text' => "Orders",
                'to' => \route('orders.index'),
            ],
            [
                'icon' =>  "mdi-account",
                'text' => "Likes",
                'to' => \route('likes.index'),
            ],
        ];

        $rightMenuItems = [
            [
                'icon' => "mdi-account"
            ]
        ];

        return view('components.user.app', ['menuItems' => $menuItems, 'rightMenuItems' => $rightMenuItems]);
    }
}