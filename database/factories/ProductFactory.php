<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        return [
            'name'        => $this->faker->word,
            'slug'        => $this->faker->slug,
            'status'      => Product::STATUS_INACTIVE,
            'description' => $this->faker->text,
            'price'       => $this->faker->numberBetween(0, 1000),
            'quantity'    => $this->faker->numberBetween(0, 100),
        ];
    }
}
