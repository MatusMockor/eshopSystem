<?php

use App\Models\SubPage;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function PHPUnit\Framework\assertEquals;

test('admin sees sub pages in dashboard', function () {
    login();
    $page = SubPage::factory()->create();
    get(route('dashboard.subPages.index'))->assertStatus(200);
});

test('the user cannot see the sub pages in dashboard', function () {
    $page = SubPage::factory()->create();
    get(route('dashboard.subPages.index'))->assertStatus(302);
});

test('admin can visit create sub page form', function () {
    login();
    get(route('dashboard.subPages.create'))->assertStatus(200);
});

test('admin can create sub page', function () {
    login();
    post(route('dashboard.subPages.store', [
        'name' => fake()->name,
        'body' => fake()->text,
    ]))->assertStatus(302);

    assertEquals(1, SubPage::count());
});
