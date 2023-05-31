<?php

namespace App\Repositories\Interface;

use Illuminate\Database\Eloquent\Model;

interface CategoryRepositoryContract
{
    public function create(array $data);
}
