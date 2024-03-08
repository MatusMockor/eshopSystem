<?php

use App\Models\Setting;

use function Pest\Laravel\patch;

it('user can update page settings', function () {
    login();
    $settings = Setting::factory()->create();
    $newData = [
        'title'    => config('app.name'),
        'email'    => fake()->unique()->safeEmail(),
        'address'  => fake()->address(),
        'city'     => fake()->city(),
        'zip_code' => fake()->randomNumber(),
    ];

    patch(route('dashboard.settings.update', $settings), $newData);
    $settings->refresh();

    expect($settings)->title->toBe($newData['title'])->email->toBe($newData['email'])->address->toBe($newData['address'])->city->toBe($newData['city'])->zip_code->toBe($newData['zip_code']);
});
