<?php

namespace App\Repositories\Interface;

use App\Models\Category;

interface CategoryRepositoryContract
{
    public function create(array $data) : void;

    public function update(Category $category, array $data) : void;
}
