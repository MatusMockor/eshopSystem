<?php

use App\Models\Page;
use function Pest\Laravel\get;

test('admin sees pages in dashboard', function () {
    login();
    $page = Page::factory()->create();
    get(route('dashboard.page.index'))->assertStatus(200);
});

test('the user cannot see the pages in dashboard', function () {
    $page = Page::factory()->create();
    get(route('dashboard.page.index'))->assertStatus(302);
});