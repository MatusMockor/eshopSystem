<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
            'name'        => $this->faker->words(2, true).' product',
            'slug'        => $this->faker->slug,
            'category_id' => Category::factory(),
            'status'      => Product::STATUS_INACTIVE,
            'description' => $this->faker->text,
            'price'       => $this->faker->numberBetween(0, 1000),
            'quantity'    => $this->faker->numberBetween(0, 100),
        ];
    }

    public function soldOut(): self
    {
        return $this->state([
            'status'   => Product::STATUS_SOLD_OUT,
            'quantity' => 0,
        ]);
    }

    public function active(): self
    {
        return $this->state([
            'status' => Product::STATUS_ACTIVE,
        ]);
    }
}
