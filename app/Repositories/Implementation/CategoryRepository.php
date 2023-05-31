<?php

namespace App\Repositories\Implementation;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepositoryContract;

class CategoryRepository implements CategoryRepositoryContract
{
    public function create(array $data) : void
    {
        Category::create($data);
    }
}
