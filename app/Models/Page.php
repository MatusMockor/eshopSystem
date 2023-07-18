<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $slug
 * @property string $body
 */
class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'body',
    ];
}
