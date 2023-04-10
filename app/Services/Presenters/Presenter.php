<?php

namespace App\Services\Presenters;

use Illuminate\Database\Eloquent\Model;

class Presenter
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    //MAGIC PHP METHOD
    public function __get($prop)
    {
        return $this->$prop();
    }
}