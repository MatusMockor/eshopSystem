<?php

namespace App\Observers\Dashboard;

use App\Models\Product;
use Str;

class ProductObserver
{
    public function creating(Product $product) : void
    {
        $product->slug = Str::slug($product->name);
    }

    public function updating(Product $product) : void
    {
        $product->slug = Str::slug($product->name);
    }
}
