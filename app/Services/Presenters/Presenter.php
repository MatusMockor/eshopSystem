<?php

namespace App\Services\Presenters;

use Illuminate\Database\Eloquent\Model;

class Presenter
{
    public function __construct(protected Model $model)
    {
    }

    //MAGIC PHP METHOD
    public function __get($prop)
    {
        return $this->$prop();
    }
}
