<?php

namespace Tests\Feature\Page;

use App\Models\SubPage;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SubPageManagementTest extends TestCase
{
    #[Test]
    public function admin_sees_sub_pages_in_dashboard(): void
    {
        $this->be(User::factory()->create());
        $page = SubPage::factory()->create();
        $this->get(route('dashboard.subPages.index'))->assertStatus(200);
    }

    #[Test]
    public function the_user_cannot_see_the_sub_pages_in_dashboard(): void
    {
        $page = SubPage::factory()->create();
        $this->get(route('dashboard.subPages.index'))->assertStatus(302);
    }

    #[Test]
    public function admin_can_visit_create_sub_page_form(): void
    {
        $this->be(User::factory()->create());
        $this->get(route('dashboard.subPages.create'))->assertStatus(200);
    }

    #[Test]
    public function admin_can_create_sub_page(): void
    {
        $this->be(User::factory()->create());

        $this->post(route('dashboard.subPages.store', [
            'name' => fake()->name,
            'body' => fake()->text,
        ]))->assertStatus(302);

        $this->assertEquals(1, SubPage::count());
    }
}
