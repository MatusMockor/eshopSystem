<?php

namespace Database\Factories;

use App\Models\SubPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubPageFactory extends Factory
{
    protected $model = SubPage::class;

    public function definition() : array
    {
        return [
            'name'       => $this->faker->name(),
            'slug'       => $this->faker->slug(),
            'body'       => $this->faker->randomHtml,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
