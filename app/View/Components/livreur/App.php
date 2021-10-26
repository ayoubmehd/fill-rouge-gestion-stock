<?php

namespace App\View\Components\livreur;

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
                'to' => \route('livreur.index'),
            ],
            [
                'icon' =>  "mdi-lightbulb-on",
                'text' => "Orders",
                'to' => \route('livreur.orders.index'),
            ],
            [
                'icon' => "mdi-cart-plus",
                'text' => "Commentaires",
                'to' => \route('livreur.commentaires.index'),
            ],
        ];

        $rightMenuItems = [
            [
                'icon' => "mdi-star",
                'to' => '#'
            ],
            [
                'icon' => "mdi-truck",
                'to' => '#'
            ],
            [
                'icon' => "mdi-logout",
                'to' => \route('logout')
            ],
        ];

        return view('components.livreur.app', ['menuItems' => $menuItems, 'rightMenuItems' => $rightMenuItems]);
    }
}