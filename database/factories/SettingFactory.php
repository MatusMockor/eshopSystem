<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition() : array
    {
        return [
            'title'      => config('app.name'),
            'email'      => $this->faker->unique()->safeEmail(),
            'address'    => $this->faker->address(),
            'city'       => $this->faker->city(),
            'zip_code'   => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
