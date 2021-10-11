<?php

namespace Database\Seeders;

use App\Models\Commentaire;
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
            ->has(
                Commentaire::factory()
            )
            ->has(\App\Models\Commande::factory()
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
            ->state(['livreur_id' => $livreur->id])->create();
    }
}