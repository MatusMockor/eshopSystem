<?php

use App\Models\Category;
use Illuminate\Support\Str;

use function Pest\Laravel\post;

it('user can create a category', function () {
    login();
    $name = fake()->title;
    post(route('dashboard.categories.store'), [
        'name' => $name,
    ]);

    expect(Category::firstWhere('name', $name)->name)->toBe($name);
});

it('slug changed when category name updated', function () {
    $category = Category::factory()->create();
    $newName = fake()->name;
    $category->update(['name' => $newName]);
    $category->refresh();
    expect($category->slug)->toBe(Str::slug($newName));
});

it('user can not create category with exists name', function () {
    login();
    $name = 'Category name';
    post(route('dashboard.categories.store'), [
        'name' => $name,
    ]);
    post(route('dashboard.categories.store'), [
        'name' => $name,
    ])->assertSessionHasErrors();
});
