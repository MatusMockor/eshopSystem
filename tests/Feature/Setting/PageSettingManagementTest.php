<?php

namespace Tests\Feature\Setting;

use App\Models\Setting;
use App\Models\User;
use Tests\TestCase;

class PageSettingManagementTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->be(User::factory()->create());
    }

    /** @test */
    public function user_can_update_page_settings(): void
    {
        $settings = Setting::factory()->create();
        $newData = [
            'title'    => config('app.name'),
            'email'    => fake()->unique()->safeEmail(),
            'address'  => fake()->address(),
            'city'     => fake()->city(),
            'zip_code' => fake()->randomNumber(),
        ];

        $this->patch(route('dashboard.settings.update', $settings), $newData);
        $settings->refresh();

        $this->assertEquals($newData['title'], $settings->title);
        $this->assertEquals($newData['email'], $settings->email);
        $this->assertEquals($newData['address'], $settings->address);
        $this->assertEquals($newData['city'], $settings->city);
        $this->assertEquals($newData['zip_code'], $settings->zip_code);
    }
}
