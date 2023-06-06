<?php

namespace App\Observers;

use App\Models\Product;
use Str;

class ProductObserver
{
    public function creating(Product $product) : void
    {
        $product->slug = Str::slug($product->name);
    }
}