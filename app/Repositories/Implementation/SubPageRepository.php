<?php

namespace App\Repositories\Implementation;

use App\Models\SubPage;

class SubPageRepository implements \App\Repositories\Interface\SubPageRepositoryContract
{
    public function create(array $data) : void
    {
        SubPage::create($data);
    }
}