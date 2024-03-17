<?php

namespace Tests\Feature\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CategoryManagementTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->be(User::factory()->create());
    }

    #[Test]
    public function test_user_can_create_a_category(): void
    {
        $name = fake()->title;
        $this->post(route('dashboard.categories.store'), [
            'name' => $name,
        ]);

        $this->assertEquals($name, Category::firstWhere('name', $name)->name);
    }

    #[Test]
    public function slug_changed_when_category_name_updated(): void
    {
        $category = Category::factory()->create();
        $newName = fake()->name;
        $category->update(['name' => $newName]);
        $category->refresh();
        $this->assertEquals(Str::slug($newName), $category->slug);
    }

    #[Test]
    public function user_can_not_create_category_with_exists_name(): void
    {
        $name = 'Category name';
        $this->post(route('dashboard.categories.store'), [
            'name' => $name,
        ]);
        $response = $this->post(route('dashboard.categories.store'), [
            'name' => $name,
        ]);

        $response->assertSessionHasErrors();
    }
}
