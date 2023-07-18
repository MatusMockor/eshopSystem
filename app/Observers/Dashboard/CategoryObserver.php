<?php

namespace App\Observers\Dashboard;

use App\Models\Category;
use Str;

class CategoryObserver
{
    public function creating(Category $category): void
    {
        $category->slug = Str::slug($category->name);
    }

    public function updating(Category $category): void
    {
        $category->slug = Str::slug($category->name);
    }
}
