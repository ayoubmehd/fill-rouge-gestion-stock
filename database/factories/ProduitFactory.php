<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'prix' => $this->faker->randomFloat(2, 0, 1000),
            'description' => \collect($this->faker->paragraphs(5))->implode('<br />'),
            'quantite' => $this->faker->randomNumber(3)
        ];
    }
}