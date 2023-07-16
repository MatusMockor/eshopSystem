<?php

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\delete;
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

it('slug changed when admin update product name', function () {
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

    expect($product->slug)->toBe(Str::slug($newName));
});

it('admin can delete product', function () {
    login();

    $product = Product::factory()->create();
    $productId = $product->id;

    delete(route('dashboard.products.delete', $product));
    expect(Product::firstWhere('id', $productId))->toBeNull();
});

it('user can upload images for product', function () {
    Storage::fake('local');
    login();

    $product = Product::factory()->create();
    $image = UploadedFile::fake()->image('test.png');

    patch(route('dashboard.products.update', $product), [
        'name'        => $product->name,
        'status'      => $product->status,
        'description' => $product->description,
        'price'       => $product->price,
        'quantity'    => $product->quantity,
        'images'      => [
            $image,
        ],
    ]);

    /** @var Image $image */
    $image = $product->images->first();
    Storage::disk('local')->assertExists($image->image_path);
});
