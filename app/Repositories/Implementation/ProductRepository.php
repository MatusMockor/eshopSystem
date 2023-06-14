<?php

namespace App\Repositories\Implementation;

use App\Models\Product;
use App\Repositories\Interface\ProductRepositoryContract;

class ProductRepository implements ProductRepositoryContract
{
    public function create(array $data) : void
    {
        Product::create($data);
    }

    public function update(Product $product,array $data) : void
    {
        $product->update($data);
    }
}
