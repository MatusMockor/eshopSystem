<?php

use App\Models\Product;
use function Pest\Laravel\patch;
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

it('admin can update the product', function () {
    login();
    $product = Product::factory()->create();
    $newName = fake()->name;

    patch(route('dashboard.products.update', $product->id), [
        'name'        => $newName,
        'status'      => $product->status,
        'description' => $product->description,
        'price'       => $product->price,
        'quantity'    => $product->quantity,
    ]);

    $product->refresh();

    expect($product->name)->toBe($newName);
});
