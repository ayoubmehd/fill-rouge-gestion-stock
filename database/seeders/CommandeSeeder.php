<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Commande::factory(3)
            ->hasAttached(
                \App\Models\Produit::factory(2)
                    ->for(
                        \App\Models\Categorie::factory()
                    ),
                ['quantite' => rand(1, 200)]
            )
            ->for(
                \App\Models\User::factory()->state(['role' => 'user'])
            )
            ->for(
                \App\Models\Livraison::factory()
                    ->for(
                        \App\Models\User::factory()->state(['role' => 'livreur']),
                        'livreur'
                    )
            )->create();
    }
}