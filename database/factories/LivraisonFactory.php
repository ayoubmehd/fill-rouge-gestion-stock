<?php

namespace Database\Factories;

use App\Models\Livraison;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivraisonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livraison::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['pas-livre', 'livrer', 'recu', 'termine']),
            'date_livraison' => $this->faker->date(),
            'date_recu' => $this->faker->date(),
        ];
    }
}