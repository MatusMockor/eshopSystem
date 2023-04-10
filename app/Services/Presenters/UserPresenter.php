<?php

namespace App\Services\Presenters;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property User   $model
 * @property string $fullName
 */
class UserPresenter extends Presenter
{
    public function fullName(): string
    {
        $user = $this->model;
        return $user->first_name . ' ' . $user->last_name;
    }
}