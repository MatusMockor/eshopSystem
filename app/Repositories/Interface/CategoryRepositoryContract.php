<?php

namespace App\Repositories\Interface;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

interface CategoryRepositoryContract
{
    public function create(array $data) : void;

    public function update(Category $category, array $data) : void;
}
