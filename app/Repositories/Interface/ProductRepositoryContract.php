<?php

namespace App\Repositories\Interface;

use App\Models\Product;

interface ProductRepositoryContract
{
    public function create(array $data) : void;

    public function update(Product $product, array $data) : void;
}
