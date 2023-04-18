<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->name,
            'slug'        => $this->faker->slug,
            'description' => $this->faker->text,
            'price'       => $this->faker->numberBetween(0, 1000),
            'category_id' => null
        ];
    }
}
