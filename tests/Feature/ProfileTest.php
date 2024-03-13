<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    public function test_profile_page_is_displayed()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/profile');
        $response->assertOk();
    }

    public function test_email_verification_status_is_unchanged_when_email_address_is_unchanged()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->patch('/profile', [
            'name'  => 'Test User',
            'email' => $user->email,
        ]);
        $response->assertSessionHasNoErrors()->assertRedirect('/profile');
        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_user_can_delete_their_account()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->delete('/profile', [
            'password' => 'password',
        ]);
        $response->assertSessionHasNoErrors()->assertRedirect('/');
        $this->assertGuest();
        $this->assertNull($user->fresh());
    }
}
