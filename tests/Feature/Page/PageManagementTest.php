<?php

use App\Models\Page;
use function Pest\Laravel\get;

test('admin sees pages in dashboard', function () {
    login();
    $page = Page::factory()->create();
    get(route('dashboard.pages.index'))->assertStatus(200);
});

test('the user cannot see the pages in dashboard', function () {
    $page = Page::factory()->create();
    get(route('dashboard.pages.index'))->assertStatus(302);
});

test('admin can visit create page form', function () {
    login();
    get(route('dashboard.pages.create'))->assertStatus(200);
});