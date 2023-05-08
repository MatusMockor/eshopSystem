<?php

use App\Models\User;

function user(): User|null
{
    return auth()->user();
}