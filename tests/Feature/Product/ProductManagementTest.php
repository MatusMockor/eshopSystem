<?php

use App\Models\Product;
use function Pest\Laravel\post;

it("admin can create new product", function () {
    login();
    post(route('dashboard.products.store'), [
        'name'     => fake()->name,
        'status'   => Product::STATUS_INACTIVE,
        'quantity' => random_int(0, 100),
        'price'    => random_int(0, 100),
    ]);

    expect(Product::count())->toBeOne();
});
