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
        $livreur = \App\Models\User::factory()->state(['role' => 'livreur'])->create();

        \App\Models\Livraison::factory(30)
            ->for(\App\Models\Commande::factory()
                ->hasAttached(
                    \App\Models\Produit::factory(200)
                        ->for(
                            \App\Models\Categorie::factory()
                        ),
                    ['quantite' => \mt_rand(1, 200)]
                )
                ->for(
                    \App\Models\User::factory()->state(['role' => 'user'])
                ))
            ->state(['livreur_id' => $livreur->id]);
        // \App\Models\Commande::factory()
        //     ->hasAttached(
        //         \App\Models\Produit::factory(200)
        //             ->for(
        //                 \App\Models\Categorie::factory()
        //             ),
        //         ['quantite' => \mt_rand(1, 200)]
        //     )
        //     ->for(
        //         \App\Models\User::factory()->state(['role' => 'user'])
        //     )
        //     ->for(
        //         \App\Models\Livraison::factory()
        //             ->state(['livreur_id' => $livreur->id])
        //     )->create();
    }
}