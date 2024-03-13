<?php

namespace Tests\Feature\Product;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->be(User::factory()->create());
    }

    /** @test */
    public function admin_can_create_new_product(): void
    {
        $category = Category::factory()->create();
        $this->post(route('dashboard.products.store'), [
            'name'        => fake()->name,
            'status'      => Product::STATUS_INACTIVE,
            'category_id' => $category->id,
            'quantity'    => random_int(0, 100),
            'price'       => random_int(0, 100),
        ]);

        $this->assertEquals(1, Product::count());
    }

    /** @test */
    public function admin_can_update_the_product(): void
    {
        $product = Product::factory()->create();
        $newName = fake()->name;

        $this->patch(route('dashboard.products.update', $product->id), [
            'name'        => $newName,
            'category_id' => $product->category_id,
            'status'      => $product->status,
            'description' => $product->description,
            'price'       => $product->price,
            'quantity'    => $product->quantity,
        ]);

        $product->refresh();

        $this->assertEquals($newName, $product->name);
    }

    /** @test */
    public function slug_changed_when_admin_update_product_name(): void
    {
        $product = Product::factory()->create();
        $newName = fake()->name;

        $this->patch(route('dashboard.products.update', $product->id), [
            'name'        => $newName,
            'category_id' => $product->category_id,
            'status'      => $product->status,
            'description' => $product->description,
            'price'       => $product->price,
            'quantity'    => $product->quantity,
        ]);

        $product->refresh();

        $this->assertEquals(Str::slug($newName), $product->slug);
    }

    /** @test */
    public function admin_can_delete_product(): void
    {
        $product = Product::factory()->create();
        $productId = $product->id;

        $this->delete(route('dashboard.products.delete', $product));
        $this->assertNull(Product::firstWhere('id', $productId));
    }

    /** @test */
    public function user_can_upload_images_for_product(): void
    {
        Storage::fake('public');

        $product = Product::factory()->create();
        $image = UploadedFile::fake()->image('test.png');

        $this->patch(route('dashboard.products.update', $product), [
            'name'        => $product->name,
            'status'      => $product->status,
            'category_id' => $product->category_id,
            'description' => $product->description,
            'price'       => $product->price,
            'quantity'    => $product->quantity,
            'images'      => [
                $image,
            ],
        ]);

        /** @var Image $image */
        $image = $product->images->first();
        Storage::disk('public')->assertExists($image->image_path);
    }

    /** @test */
    public function user_can_not_create_product_without_category(): void
    {
        $this->post(route('dashboard.products.store'), [
            'name'     => fake()->name,
            'status'   => Product::STATUS_INACTIVE,
            'quantity' => random_int(0, 100),
            'price'    => random_int(0, 100),
        ])->assertSessionHasErrors('category_id');
    }
}
